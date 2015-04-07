<?php
$TRANSLATIONS = array(
"Failed to clear the mappings." => "Αποτυχία εκκαθάρισης των αντιστοιχιών.",
"Failed to delete the server configuration" => "Αποτυχία διαγραφής ρυθμίσεων διακομιστή",
"The configuration is valid and the connection could be established!" => "Οι ρυθμίσεις είναι έγκυρες και η σύνδεση μπορεί να πραγματοποιηθεί!",
"The configuration is valid, but the Bind failed. Please check the server settings and credentials." => "Οι ρυθμίσεις είναι έγκυρες, αλλά απέτυχε η σύνδεση. Παρακαλώ ελέγξτε τις ρυθμίσεις του διακομιστή και τα διαπιστευτήρια.",
"Deletion failed" => "Η διαγραφή απέτυχε",
"Take over settings from recent server configuration?" => "Πάρτε πάνω από τις πρόσφατες ρυθμίσεις διαμόρφωσης του διακομιστή?",
"Keep settings?" => "Διατήρηση ρυθμίσεων;",
"Cannot add server configuration" => "Αδυναμία προσθήκης ρυθμίσεων διακομιστή",
"mappings cleared" => "αντιστοιχίες εκκαθαρίστηκαν",
"Success" => "Επιτυχία",
"Error" => "Σφάλμα",
"Select groups" => "Επιλέξτε ομάδες",
"Connection test succeeded" => "Επιτυχημένη δοκιμαστική σύνδεση",
"Connection test failed" => "Αποτυχημένη δοκιμαστική σύνδεσης.",
"Do you really want to delete the current Server Configuration?" => "Θέλετε να διαγράψετε τις τρέχουσες ρυθμίσεις του διακομιστή;",
"Confirm Deletion" => "Επιβεβαίωση Διαγραφής",
"_%s group found_::_%s groups found_" => array("",""),
"_%s user found_::_%s users found_" => array("",""),
"Save" => "Αποθήκευση",
"Test Configuration" => "Δοκιμαστικες ρυθμισεις",
"Help" => "Βοήθεια",
"Add Server Configuration" => "Προσθήκη Ρυθμίσεων Διακομιστή",
"Host" => "Διακομιστής",
"You can omit the protocol, except you require SSL. Then start with ldaps://" => "Μπορείτε να παραλείψετε το πρωτόκολλο, εκτός αν απαιτείται SSL. Σε αυτή την περίπτωση ξεκινήστε με ldaps://",
"Port" => "Θύρα",
"User DN" => "User DN",
"The DN of the client user with which the bind shall be done, e.g. uid=agent,dc=example,dc=com. For anonymous access, leave DN and Password empty." => "Το DN του χρήστη πελάτη με το οποίο θα πρέπει να γίνει η σύνδεση, π.χ. uid=agent,dc=example,dc=com. Για χρήση χωρίς πιστοποίηση, αφήστε το DN και τον Κωδικό κενά.",
"Password" => "Συνθηματικό",
"For anonymous access, leave DN and Password empty." => "Για ανώνυμη πρόσβαση, αφήστε κενά τα πεδία DN και Pasword.",
"One Base DN per line" => "Ένα DN Βάσης ανά γραμμή ",
"You can specify Base DN for users and groups in the Advanced tab" => "Μπορείτε να καθορίσετε το Base DN για χρήστες και ομάδες από την καρτέλα Προηγμένες ρυθμίσεις",
"Back" => "Επιστροφή",
"Continue" => "Συνέχεια",
"<b>Warning:</b> Apps user_ldap and user_webdavauth are incompatible. You may experience unexpected behavior. Please ask your system administrator to disable one of them." => "<b>Προσοχή:</b> Οι εφαρμογές user_ldap και user_webdavauth είναι ασύμβατες. Μπορεί να αντιμετωπίσετε απρόβλεπτη συμπεριφορά. Παρακαλώ ζητήστε από τον διαχειριστή συστήματος να απενεργοποιήσει μία από αυτές.",
"<b>Warning:</b> The PHP LDAP module is not installed, the backend will not work. Please ask your system administrator to install it." => "<b>Προσοχή:</b> Το άρθρωμα PHP LDAP δεν είναι εγκατεστημένο και το σύστημα υποστήριξης δεν θα δουλέψει. Παρακαλώ ζητήστε από τον διαχειριστή συστήματος να το εγκαταστήσει.",
"Connection Settings" => "Ρυθμίσεις Σύνδεσης",
"Configuration Active" => "Ενεργοποιηση ρυθμισεων",
"When unchecked, this configuration will be skipped." => "Όταν δεν είναι επιλεγμένο, αυτή η ρύθμιση θα πρέπει να παραλειφθεί. ",
"Backup (Replica) Host" => "Δημιουργία αντιγράφων ασφαλείας (Replica) Host ",
"Give an optional backup host. It must be a replica of the main LDAP/AD server." => "Δώστε μια προαιρετική εφεδρική υποδοχή. Πρέπει να είναι ένα αντίγραφο του κύριου LDAP / AD διακομιστη.",
"Backup (Replica) Port" => "Δημιουργία αντιγράφων ασφαλείας (Replica) Υποδοχη",
"Disable Main Server" => "Απενεργοποιηση του κεντρικου διακομιστη",
"Case insensitve LDAP server (Windows)" => "LDAP server (Windows) με διάκριση πεζών-ΚΕΦΑΛΑΙΩΝ",
"Turn off SSL certificate validation." => "Απενεργοποίηση επικύρωσης πιστοποιητικού SSL.",
"Cache Time-To-Live" => "Cache Time-To-Live",
"in seconds. A change empties the cache." => "σε δευτερόλεπτα. Μια αλλαγή αδειάζει την μνήμη cache.",
"Directory Settings" => "Ρυθμίσεις Καταλόγου",
"User Display Name Field" => "Πεδίο Ονόματος Χρήστη",
"Base User Tree" => "Base User Tree",
"One User Base DN per line" => "Ένα DN βάσης χρηστών ανά γραμμή",
"User Search Attributes" => "Χαρακτηριστικά αναζήτησης των χρηστών ",
"Optional; one attribute per line" => "Προαιρετικά? Ένα χαρακτηριστικό ανά γραμμή ",
"Group Display Name Field" => "Group Display Name Field",
"Base Group Tree" => "Base Group Tree",
"One Group Base DN per line" => "Μια ομαδικη Βάση DN ανά γραμμή",
"Group Search Attributes" => "Ομάδα Χαρακτηριστικων Αναζήτηση",
"Group-Member association" => "Group-Member association",
"Special Attributes" => "Ειδικά Χαρακτηριστικά ",
"Quota Field" => "Ποσοσταση πεδιου",
"Quota Default" => "Προκαθισμενο πεδιο",
"in bytes" => "σε bytes",
"Email Field" => "Email τυπος",
"User Home Folder Naming Rule" => "Χρήστης Προσωπικόςφάκελος Ονομασία Κανόνας ",
"Leave empty for user name (default). Otherwise, specify an LDAP/AD attribute." => "Αφήστε το κενό για το όνομα χρήστη (προεπιλογή). Διαφορετικά, συμπληρώστε μία ιδιότητα LDAP/AD.",
"Internal Username" => "Εσωτερικό Όνομα Χρήστη",
"Internal Username Attribute:" => "Ιδιότητα Εσωτερικού Ονόματος Χρήστη:"
);
$PLURAL_FORMS = "nplurals=2; plural=(n != 1);";