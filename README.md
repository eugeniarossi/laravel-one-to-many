# Laravel Boolfolio - Base

Sistema di gestione di un Portfolio di progetti.

Iniziamo con il definire il layout, modello, migrazione, controller e rotte necessarie per il sistema portfolio:

1. Autenticazione: si parte con l'autenticazione e la creazione di un layout per back-office
2. Creazione del modello Project con relativa migrazione, seeder, controller e rotte
3. Per la parte di back-office creiamo un resource controller Admin\ProjectController per gestire tutte le operazioni CRUD dei progetti

## Bonus
Implementiamo la validazione dei dati dei Progetti nelle operazioni CRUD che lo richiedono usando due form requests.