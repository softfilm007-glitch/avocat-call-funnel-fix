# Setup GTM / Google Ads conversioni reali

Data: 2 giugno 2026

## Eventi prodotti dal plugin

Il plugin `avocat-call-funnel-fix` invia questi eventi:

- `phone_click`
- `whatsapp_click`
- `email_click`
- `lead_form_submit`

Gli eventi vengono inviati sia a:

- `window.dataLayer`
- `gtag`, se presente

## Trigger GTM da creare

In Google Tag Manager:

1. Trigger -> New -> Custom Event
2. Crea questi trigger:
   - `phone_click`
   - `whatsapp_click`
   - `email_click`
   - `lead_form_submit`

## Conversioni Google Ads consigliate

Principali:

- `phone_click`
- `whatsapp_click`
- `lead_form_submit`
- chiamate da annunci Google

Secondarie:

- `email_click`, se vuoi solo osservare
- pagine viste
- conversioni vecchie/inattive
- click generici

## Stato conversioni Google Ads

Gia corretto:

- `Clic pentru apelare` -> Secondaria
- `Clicks to call` -> Principale e attiva

Da evitare:

- Non rendere principale una conversione inattiva solo per far sparire un errore.
- Non creare conversioni false di tipo acquisto.
- Non ottimizzare per pagine viste.

## Campagne da usare per ottimizzazione

Le modifiche devono riguardare solo campagne attive:

- `Codex_Romania`
- `Codex_Inglese`
- `Codex_Italia`
- `Avocat Urbanism Oradea`

Non applicare a tutte le campagne.

## Nota su Avocat Urbanism Oradea

La campagna e Smart/Express. Le negative keywords classiche non sono gestite come nelle campagne Search. Usare le sezioni:

- termini di ricerca
- temi parole chiave negative

quando Google Ads mostra dati disponibili.
