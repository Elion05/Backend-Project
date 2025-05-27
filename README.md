README Elion Rexhepi 27/05/2025 17:56
Projectbeschrijving en functionaliteiten
: Mijn thema dat ik heb gekozen is gaming, een website waar je vragen kan stellen en vragen op vinden zoals bv stackoverflow (behalve dat je geen comments kan plaatsen).

Implementatie van elke technisch vereiste (waar in de code?/lijnnummer):µ
gebruikers kunnen inloggen en registeren zie => resources/views/auth/login en register.
Admins kunnen gebruikers aanmaken en rechten aangeven zie => resources/views/admin/users
voor de rechten zie in index.blade op lijn 36.
Elke gebruiker heeft zijn profiel pagina zelf niet ingelogde gebruikers, ingelogde gebruikers kunnen zijn data aanpassen
zie => views/profile/ al deze files hebben dit hier, default profiel pagina voor niet ingelogde gebruikers.
laatste nieuwtjes, admins kunnen nieuws items toevegen met foto, kunnen het verwijderen en wijzigen zie views/admin/nieuws app/http/controllerrs/nieuwscontroller
FAQ pagina, admins kunnen categorien toevoegen kunnen vragen toevoegen, wijzigen en verwijderen, iedereen kan de FAQ zien, zie => app/http/controllers/admin/ en Models
resources/views/admin/faq en faq_categories, resources/views/faq.
Contact pagina is zichtbaar alleen voor admins, berichten sturen kan je doen als je gebruiker ben en via de de home pagina doen. zie views/admin/contact en views/nieuws


Technische vereiste:
views: mijn eigen en laravel zijn layouts gebruikt zie => views/layouts en html_layouts
CSRF => views/nieuws/index op lijn 30 (dat is gewoon 1 ervan)
Routes: ik heb geprobeerd al mijn routes zo goed mogelijk te groeperen zie Routes/web.php
ik heb de routes gefixt met chatgpt wanneer ik errors kreeg omdat het lang duurde en ik begreep de fouten niet, alleen maar wanneer chatgpt het mij toonde.
Controller: ik heb 8 controllers in het project, /admin is voor admins alleen
Models: ik heb 1 One-to-many relatie tussen faq en faqcategory in /Models
Database: ik heb met mysql geconnecteert, de database heeft alle nodige data, hier een foto van 3.
![Screenshot 2025-05-27 182513](https://github.com/user-attachments/assets/ec4a0a49-4d14-4eb9-8367-395ef385770a)
Authentication: Gebruikers kunnen inloggen, registeren, remember me, maar kunnen zijn wachtwoord niet veranderen.
Er is een default admin: admin@ehb.be, Password!321
Layout: mijn eigen layout voor meeste pages gebruikt, maar ook de default laravel gelaten.

Foto van de front page van de website
![Screenshot 2025-05-27 182741](https://github.com/user-attachments/assets/9fb19cec-7d8f-47a6-af86-ce92765c8c7a)


AI LOGS:
ik heb chatgpt gebruikt voor het structureren van mij routes, het mooier maken van de css.
Controllers helpen fixen en verbeteren, voor de models heb ik bij Faq en FaqCategory chatgpt gebruikt om na te kijken of het een one to many, voor de rest was de models redelijk hetzelfde zoals in de bestaande files (User.php).
Migrations, alles stond in het boek hier heb ik weinig chatgpt gebruikt, ik heb het hier gebruikt om te zien of alles goed stond, dus niet echt om te veranderen.
Factories: ik heb factories niet aangeraakt.
Seeders: bijna niet met chatgpt gemaakt, het was makkelijk, er stond duidelijke instructies in de cursus en de leerkracht gaf advies hoe je dat aanmaakt en dan verwerkt.
CSS: ik heb chatgpt wel gebruikt om mijn css op te verbeteren zodat het meer gebruikers vriendelijker is.
Classes: ik heb chatgpt gebruikt om al mijn html elementen een classe te geven om meer tijd te besparen.

Ik heb gecommit vanaf de dag dat ik ben begonnen, maar ben soms vergeten te pushen.


de fotos dat ik heb gebruikt zijn van mijn static web, het leek mij makkelijker om al gedonwloade fotos te gebruiken
![Screenshot 2025-05-27 184815](https://github.com/user-attachments/assets/e86732ee-b924-46fd-a910-3591cbd19294)
![Screenshot 2025-05-27 184858](https://github.com/user-attachments/assets/a27df2a2-4259-4eb7-8d5c-ed691979febc)

voor admin beheerder te zijn
admin@ehb.be wachtwoord is Password!321





 


