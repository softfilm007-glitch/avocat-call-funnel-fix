# Analisi funnel chiamate - Avocat Montenegro

Data: 2 giugno 2026
Aggiornamento: 4 giugno 2026

## Diagnosi rapida

Il sito ha CTA telefoniche presenti, ma il funnel non e ancora abbastanza "call-first". Le pagine IT/EN/RO hanno link telefonici e form, pero il percorso reale puo disperdere l'utente tra form, email, pagina contatto, cookie/tracking e contenuti lunghi.

## Cosa ho verificato

- Homepage RO/IT/EN: HTTP 200, telefono presente, 1 form per pagina.
- Pagine contatto RO/IT/EN: HTTP 200, telefono presente, 1 form per pagina.
- Pagine consulenza online RO/IT/EN: HTTP 200, telefono presente, 1 form per pagina.
- Tag Google Ads trovato: `AW-927014901`.
- Ogni pagina controllata ha link `tel:` multipli.
- WhatsApp compare nel codice ed e stato aggiunto come CTA reale nella barra mobile.
- Le pagine sono pesanti: circa 175-194 KB di solo HTML, 24 CSS, 26-27 JS, 17 script inline, 21-22 immagini.

## Stato al 4 giugno 2026

- Plugin `Avocat Call Funnel Fix` installato e attivo su WordPress.
- Verifica live positiva su:
  - `https://avocat-montenegro.ro/`
  - `https://avocat-montenegro.ro/it/`
  - `https://avocat-montenegro.ro/en/`
  - `https://avocat-montenegro.ro/contact/`
  - `https://avocat-montenegro.ro/it/contatto/`
  - `https://avocat-montenegro.ro/en/contact-me/`
- Le pagine live contengono:
  - barra `avocat-call-funnel-bar`
  - evento `phone_click`
  - link WhatsApp `wa.me/40745776743`
  - conversion label Google Ads `AW-927014901/KBwBCL-mioscEPW_hLoD`
- In Google Ads, Diagnostica conversioni mostra che le azioni di conversione ottimizzate sono attive.
- Nella selezione campagne Google Ads sono visibili come attive:
  - `Codex_Inglese`
  - `Codex_Italia`
  - `Codex_Romania`
- Non cambiare bidding alla cieca finche non ci sono conversioni recenti reali: con tracking appena corretto, mantenere una fase controllata prima di spingere pienamente su Smart Bidding.

## Dove si perde l'utente

1. Troppe alternative rispetto alla chiamata
   - Telefono, email, form, contatto, contenuti lunghi.
   - Se l'obiettivo e ricevere chiamate, la pagina deve spingere chiaramente su "Chiama ora".

2. Form con frizione
   - Il form richiede nome, email, messaggio e accettazione privacy.
   - Per un utente mobile urgente, questo e piu lento di chiamare.

3. WhatsApp non e abbastanza chiaro
   - Il codice contiene riferimenti a WhatsApp, ma bisogna verificare che ci sia un bottone reale e visibile: `wa.me/...` o `api.whatsapp.com/send`.

4. Tracking probabilmente confuso
   - In Google Ads abbiamo gia visto conversioni duplicate/inattive.
   - La conversione attiva da usare per click su chiamata e `Clicks to call`.
   - `Clic pentru apelare` era inattiva: va lasciata secondaria.

5. Campagne e sito non devono misurare click deboli
   - Non ottimizzare per visite generiche, pagine viste o click informativi.
   - Ottimizzare solo per chiamata, form inviato, WhatsApp, email, programazione.

## Azioni operative prioritarie

1. Rendere il telefono CTA principale sopra la piega
   - Bottone visibile su mobile: "Chiama ora"
   - Link: `tel:+40745776743`
   - Stesso numero ovunque, formato internazionale.

2. Aggiungere sticky mobile call bar
   - Barra fissa in basso con 2 pulsanti:
     - Chiama
     - WhatsApp
   - Non usare 4-5 scelte nella barra.

3. Verificare WhatsApp reale
   - Usare link diretto:
     - `https://wa.me/40745776743`
   - Aggiungere testo precompilato:
     - "Buongiorno, ho bisogno di assistenza legale. Vorrei fissare una consulenza."

4. Snellire il form
   - Per mobile: nome + telefono + problema.
   - Email opzionale.
   - Testo sopra: "Rispondiamo telefonicamente."

5. Tracking Google Ads
   - Primary:
     - `Clicks to call`
     - chiamate da annunci
     - form submit reale
     - WhatsApp click reale
   - Secondary:
     - conversioni inattive
     - click informativi
     - pagine viste

6. Campagne
   - Mantenere negative keywords solo su:
     - `Codex_Romania`
     - `Codex_Inglese`
     - `Codex_Italia`
     - `Avocat Urbanism Oradea`, solo tramite keyword themes se Smart campaign lo permette.
   - Dopo 7-14 giorni di segnali reali, valutare passaggio a `Maximize conversions`.
   - Prima di allora, preferire controllo CPC o `Maximize Clicks` con limite CPC, evitando traffico informativo.

## Ipotesi principale

Non e solo un problema SEO. Il problema piu probabile e un mix di:

- traffico non abbastanza qualificato,
- CTA telefonica non dominante su mobile,
- conversioni duplicate/inattive in Google Ads,
- WhatsApp forse non esposto come azione reale,
- form piu lento della chiamata,
- tracking che non separa bene chiamate reali da click deboli.

## Prossima modifica consigliata

Prima modifica da fare sul sito:

Creare una barra mobile sticky con:

- `Chiama ora` -> `tel:+40745776743`
- `WhatsApp` -> `https://wa.me/40745776743`

e tracciare entrambi come eventi separati in GA4/GTM/Google Ads.
