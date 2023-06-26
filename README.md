# Laravel Boolfolio - One to many

Ciao ragazzi,
continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo e aggiungiamo una nuova entità **Type**. <br>
Questa entità rappresenta la tipologia di progetto ed è in relazione **one to many** con i progetti.<br>
I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:<br>
- creare la migration per la tabella `types`<br>
- creare il model `Type`<br>
- creare la migration di modifica per la tabella `projects` per aggiungere la chiave esterna<br>
- aggiungere ai model Type e Project i metodi per definire la relazione one to many<br>
- visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente<br>
- permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un progetto<br>
- gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione<br>
Bonus 1:<br>
creare il seeder per il model Type e il seeder della tabella ‘projects’ con l’id del type (random) in relazione<br>
Bonus 2:<br>
aggiungere le operazioni CRUD per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.

# Steps
- Creo Model e migration di Type
