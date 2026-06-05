<?php
/**
 * Plugin Name: Avocat Call Funnel Fix
 * Description: Adds call-first phone and WhatsApp CTAs and pushes conversion events to dataLayer/gtag.
 * Version: 1.1.0
 * Author: Codex
 */

if (!defined('ABSPATH')) {
    exit;
}

final class Avocat_Call_Funnel_Fix {
    private const PHONE_DISPLAY = '+40 745 776 743';
    private const PHONE_TEL = '+40745776743';
    private const WHATSAPP_URL = 'https://wa.me/40745776743?text=Buongiorno%2C%20ho%20bisogno%20di%20assistenza%20legale.%20Vorrei%20fissare%20una%20consulenza.';
    private const EMAIL = 'avocatmontenegro@gmail.com';

    public static function init(): void {
        add_action('wp_footer', [__CLASS__, 'render_bar'], 20);
        add_action('wp_head', [__CLASS__, 'render_head'], 20);
    }

    public static function render_head(): void {
        ?>
        <style id="avocat-call-funnel-fix-css">
            .avocat-call-funnel-bar {
                position: fixed;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 999999;
                display: none;
                grid-template-columns: 1fr 1fr;
                gap: 1px;
                background: #ffffff;
                box-shadow: 0 -8px 24px rgba(0, 0, 0, 0.18);
                border-top: 1px solid rgba(0, 0, 0, 0.12);
                font-family: inherit;
            }

            .avocat-call-funnel-bar a,
            .avocat-call-funnel-desktop a {
                min-height: 58px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                text-decoration: none;
                font-size: 16px;
                line-height: 1.1;
                font-weight: 700;
                letter-spacing: 0;
            }

            .avocat-call-funnel-call,
            .avocat-call-funnel-desktop-call {
                color: #ffffff;
                background: #0b6f3a;
            }

            .avocat-call-funnel-whatsapp,
            .avocat-call-funnel-desktop-whatsapp {
                color: #ffffff;
                background: #1f7a56;
            }

            .avocat-call-funnel-icon {
                width: 20px;
                height: 20px;
                flex: 0 0 auto;
            }

            .avocat-call-funnel-desktop {
                position: fixed;
                right: 22px;
                bottom: 22px;
                z-index: 999999;
                display: none;
                width: min(360px, calc(100vw - 44px));
                overflow: hidden;
                border-radius: 8px;
                box-shadow: 0 12px 34px rgba(0, 0, 0, 0.24);
                border: 1px solid rgba(0, 0, 0, 0.14);
                font-family: inherit;
                background: #ffffff;
            }

            .avocat-call-funnel-desktop-header {
                padding: 11px 14px;
                color: #1f2933;
                background: #ffffff;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
                font-size: 14px;
                font-weight: 700;
                line-height: 1.25;
            }

            .avocat-call-funnel-desktop-actions {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1px;
                background: rgba(0, 0, 0, 0.1);
            }

            @media (max-width: 767px) {
                .avocat-call-funnel-bar {
                    display: grid;
                }

                body {
                    padding-bottom: 64px;
                }
            }

            @media (min-width: 768px) {
                .avocat-call-funnel-desktop {
                    display: block;
                }
            }
        </style>
        <?php
    }

    public static function render_bar(): void {
        $labels = self::labels();
        ?>
        <div class="avocat-call-funnel-bar" aria-label="Contact rapid">
            <a class="avocat-call-funnel-call"
               href="tel:<?php echo esc_attr(self::PHONE_TEL); ?>"
               data-avocat-conversion="phone_click"
               aria-label="<?php echo esc_attr($labels['call']); ?> <?php echo esc_attr(self::PHONE_DISPLAY); ?>">
                <svg class="avocat-call-funnel-icon" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill="currentColor" d="M6.6 10.8c1.4 2.8 3.7 5.1 6.6 6.6l2.2-2.2c.3-.3.8-.4 1.2-.3 1.3.4 2.6.6 4 .6.7 0 1.2.5 1.2 1.2v3.5c0 .7-.5 1.2-1.2 1.2C10.3 22 2 13.7 2 3.4 2 2.7 2.5 2.2 3.2 2.2h3.6c.7 0 1.2.5 1.2 1.2 0 1.4.2 2.7.6 4 .1.4 0 .9-.3 1.2l-1.7 2.2Z"/>
                </svg>
                <?php echo esc_html($labels['call']); ?>
            </a>
            <a class="avocat-call-funnel-whatsapp"
               href="<?php echo esc_url(self::WHATSAPP_URL); ?>"
               data-avocat-conversion="whatsapp_click"
               aria-label="Scrivi su WhatsApp">
                <svg class="avocat-call-funnel-icon" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill="currentColor" d="M12 2a9.8 9.8 0 0 0-8.5 14.8L2.3 22l5.3-1.2A9.8 9.8 0 1 0 12 2Zm0 17.8c-1.5 0-2.9-.4-4.1-1.1l-.3-.2-3.1.7.7-3-.2-.3A7.8 7.8 0 1 1 12 19.8Zm4.4-5.8c-.2-.1-1.4-.7-1.6-.8-.2-.1-.4-.1-.6.1-.2.3-.7.8-.8 1-.2.2-.3.2-.6.1-.2-.1-1-.4-2-1.2-.7-.6-1.2-1.3-1.4-1.6-.1-.2 0-.4.1-.5l.4-.5c.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5 0-.1-.6-1.4-.8-1.9-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.5.1-.7.3-.2.3-.9.9-.9 2.1s.9 2.4 1 2.6c.1.2 1.8 2.8 4.4 3.9.6.3 1.1.4 1.5.5.6.2 1.2.2 1.6.1.5-.1 1.4-.6 1.6-1.1.2-.6.2-1 .1-1.1-.1-.1-.2-.2-.5-.3Z"/>
                </svg>
                WhatsApp
            </a>
        </div>
        <div class="avocat-call-funnel-desktop" aria-label="Contact avocat">
            <div class="avocat-call-funnel-desktop-header">
                <?php echo esc_html($labels['desktop_header']); ?>
            </div>
            <div class="avocat-call-funnel-desktop-actions">
                <a class="avocat-call-funnel-desktop-call"
                   href="tel:<?php echo esc_attr(self::PHONE_TEL); ?>"
                   data-avocat-conversion="phone_click"
                   aria-label="<?php echo esc_attr($labels['call']); ?> <?php echo esc_attr(self::PHONE_DISPLAY); ?>">
                    <svg class="avocat-call-funnel-icon" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="currentColor" d="M6.6 10.8c1.4 2.8 3.7 5.1 6.6 6.6l2.2-2.2c.3-.3.8-.4 1.2-.3 1.3.4 2.6.6 4 .6.7 0 1.2.5 1.2 1.2v3.5c0 .7-.5 1.2-1.2 1.2C10.3 22 2 13.7 2 3.4 2 2.7 2.5 2.2 3.2 2.2h3.6c.7 0 1.2.5 1.2 1.2 0 1.4.2 2.7.6 4 .1.4 0 .9-.3 1.2l-1.7 2.2Z"/>
                    </svg>
                    <?php echo esc_html($labels['call']); ?>
                </a>
                <a class="avocat-call-funnel-desktop-whatsapp"
                   href="<?php echo esc_url(self::WHATSAPP_URL); ?>"
                   data-avocat-conversion="whatsapp_click"
                   aria-label="<?php echo esc_attr($labels['whatsapp']); ?>">
                    <svg class="avocat-call-funnel-icon" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="currentColor" d="M12 2a9.8 9.8 0 0 0-8.5 14.8L2.3 22l5.3-1.2A9.8 9.8 0 1 0 12 2Zm0 17.8c-1.5 0-2.9-.4-4.1-1.1l-.3-.2-3.1.7.7-3-.2-.3A7.8 7.8 0 1 1 12 19.8Zm4.4-5.8c-.2-.1-1.4-.7-1.6-.8-.2-.1-.4-.1-.6.1-.2.3-.7.8-.8 1-.2.2-.3.2-.6.1-.2-.1-1-.4-2-1.2-.7-.6-1.2-1.3-1.4-1.6-.1-.2 0-.4.1-.5l.4-.5c.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5 0-.1-.6-1.4-.8-1.9-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.5.1-.7.3-.2.3-.9.9-.9 2.1s.9 2.4 1 2.6c.1.2 1.8 2.8 4.4 3.9.6.3 1.1.4 1.5.5.6.2 1.2.2 1.6.1.5-.1 1.4-.6 1.6-1.1.2-.6.2-1 .1-1.1-.1-.1-.2-.2-.5-.3Z"/>
                    </svg>
                    WhatsApp
                </a>
            </div>
        </div>
        <script id="avocat-call-funnel-fix-js">
            window.dataLayer = window.dataLayer || [];

            (function () {
                var adsPhoneSendTo = 'AW-927014901/KBwBCL-mioscEPW_hLoD';

                function pushGtagCommand(args) {
                    if (typeof window.gtag === 'function') {
                        window.gtag.apply(window, args);
                        return;
                    }

                    window.dataLayer.push(args);
                }

                function pushAdsPhoneConversion(payload) {
                    pushGtagCommand(['event', 'conversion', {
                        send_to: adsPhoneSendTo,
                        event_callback: function () {},
                        transport_type: 'beacon',
                        link_url: payload.link_url || '',
                        page_path: payload.page_path || window.location.pathname
                    }]);
                }

                function pushConversion(eventName, extra) {
                    var payload = Object.assign({
                        event: eventName,
                        conversion_source: 'avocat_call_funnel_fix',
                        page_location: window.location.href,
                        page_path: window.location.pathname
                    }, extra || {});

                    window.dataLayer.push(payload);

                    if (typeof window.gtag === 'function') {
                        window.gtag('event', eventName, {
                            event_category: 'conversion',
                            event_label: payload.page_path,
                            transport_type: 'beacon'
                        });
                    }

                    if (eventName === 'phone_click') {
                        pushAdsPhoneConversion(payload);
                    }
                }

                document.addEventListener('click', function (event) {
                    var target = event.target.closest('a');
                    if (!target) {
                        return;
                    }

                    var explicitEvent = target.getAttribute('data-avocat-conversion');
                    var href = target.getAttribute('href') || '';

                    if (explicitEvent) {
                        pushConversion(explicitEvent, { link_url: href });
                        return;
                    }

                    if (href.indexOf('tel:') === 0) {
                        pushConversion('phone_click', { link_url: href });
                    } else if (href.indexOf('mailto:') === 0) {
                        pushConversion('email_click', { link_url: href });
                    } else if (/wa\.me|whatsapp|api\.whatsapp/i.test(href)) {
                        pushConversion('whatsapp_click', { link_url: href });
                    }
                }, true);

                document.addEventListener('submit', function (event) {
                    if (event.target && event.target.matches('form')) {
                        pushConversion('lead_form_submit', {
                            form_id: event.target.getAttribute('id') || '',
                            form_name: event.target.getAttribute('name') || ''
                        });
                    }
                }, true);

                if (window.jQuery) {
                    window.jQuery(document).on('submit_success', function (_event, response) {
                        pushConversion('lead_form_submit', {
                            form_plugin: 'elementor',
                            response: response ? 'ok' : ''
                        });
                    });
                }
            })();
        </script>
        <?php
    }

    private static function labels(): array {
        $path = parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH) ?: '';

        if (strpos($path, '/en/') === 0) {
            return [
                'call' => 'Call now',
                'whatsapp' => 'Message on WhatsApp',
                'desktop_header' => 'Need legal help? Call the lawyer directly.',
            ];
        }

        if (strpos($path, '/it/') === 0) {
            return [
                'call' => 'Chiama ora',
                'whatsapp' => 'Scrivi su WhatsApp',
                'desktop_header' => 'Hai bisogno di assistenza legale? Chiama direttamente.',
            ];
        }

        return [
            'call' => 'Suna acum',
            'whatsapp' => 'Scrie pe WhatsApp',
            'desktop_header' => 'Ai nevoie de ajutor juridic? Suna direct avocatul.',
        ];
    }
}

Avocat_Call_Funnel_Fix::init();
