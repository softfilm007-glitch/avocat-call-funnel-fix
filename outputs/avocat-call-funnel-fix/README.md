# Avocat Call Funnel Fix

Plugin WordPress pentru a face funnelul orientat spre apeluri reale.

## Ce face

- Adauga pe mobil o bara fixa jos:
  - Chiama ora -> `tel:+40745776743`
  - WhatsApp -> `https://wa.me/40745776743`
- Trimite evenimente in `dataLayer` si `gtag`:
  - `phone_click`
  - `whatsapp_click`
  - `email_click`
  - `lead_form_submit`
- Intercepteaza si submiturile Elementor, cand pluginul Elementor declanseaza `submit_success`.

## Instalare

1. WordPress Admin -> Plugins -> Add New -> Upload Plugin.
2. Incarca zip-ul `avocat-call-funnel-fix.zip`.
3. Activeaza pluginul.
4. Testeaza pe mobil:
   - pagina italiana
   - pagina engleza
   - pagina romana
   - paginile de contact

## Google Ads / GTM

In GTM creeaza trigger-uri Custom Event:

- `phone_click`
- `whatsapp_click`
- `email_click`
- `lead_form_submit`

Trimite catre Google Ads conversiile reale:

- `phone_click` -> conversie principala daca este click pe telefon
- `whatsapp_click` -> conversie principala
- `lead_form_submit` -> conversie principala
- `email_click` -> conversie secundara sau principala, dupa strategie

Nu folosi pagini viste come conversii principali.

## Nota

La conversione Google Ads `Clic pentru apelare` era inattiva. Va lasciata secondaria. Usare come primaria la conversione attiva `Clicks to call`.
