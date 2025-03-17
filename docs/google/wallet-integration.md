# Guide: Create a New App for Google Wallet in Your Google Developer Account

## Steps to Create the App
Um mit der Google Wallet API arbeiten zu können, müssen Sie folgende Schritte in Ihrem Google-Account durchführen:

## 1. Google Wallet API Issuer-Konto erstellen

1. Melden Sie sich im Google Pay & Wallet Console an.
2. Füllen Sie das Formular aus, um den öffentlichen Firmennamen für Ihr Issuer-Konto anzugeben.
3. Stimmen Sie den zusätzlichen Nutzungsbedingungen der Google Wallet API zu.
4. Klicken Sie auf "Build your first pass", um Ihr Issuer-Konto zu erstellen[6].

## 2. Google Wallet REST API aktivieren

1. Gehen Sie zur Google Cloud Console.
2. Wählen Sie Ihr Google Cloud-Projekt aus oder erstellen Sie ein neues.
3. Suchen Sie die Google Wallet API in der Marketplace und aktivieren Sie sie[7].

## 3. Service-Konto und Schlüssel erstellen

1. Öffnen Sie die "Service Accounts"-Seite in der Google Cloud Console.
2. Klicken Sie auf "Create Service Account" und geben Sie die Details ein.
3. Notieren Sie sich die E-Mail-Adresse des Service-Kontos.
4. Gehen Sie zum Reiter "Keys" und klicken Sie auf "Add Key" > "Create new key".
5. Wählen Sie den Schlüsseltyp "JSON" und klicken Sie auf "Create"[7][8].

## 4. Service-Konto autorisieren

1. Gehen Sie zurück zur Google Pay & Wallet Console.
2. Klicken Sie auf "Users" in der linken Navigation.
3. Klicken Sie auf "Invite a user" und geben Sie die E-Mail-Adresse des Service-Kontos ein.
4. Wählen Sie die Zugriffsebene "Developer" und klicken Sie auf "Invite"[7].

## Zertifikatsdateien und JSON

- Die JSON-Schlüsseldatei wird automatisch heruntergeladen, wenn Sie den Service-Konto-Schlüssel erstellen. Bewahren Sie diese Datei sicher auf[8].
- Für die P12-Zertifikatsdatei müssen Sie bei der Erstellung des Schlüssels den Typ "P12" statt "JSON" wählen[10].

Beachten Sie, dass Ihr Konto zunächst im "Demo-Modus" ist. Um vollen Zugriff zu erhalten, müssen Sie Ihr Google Wallet API-Geschäftsprofil vervollständigen und von Google genehmigt werden[6].

Quellen
[1] Create passes on Android using the Google Wallet API https://codelabs.developers.google.com/add-to-wallet-android
[2] Introducing the Google Wallet API https://developers.googleblog.com/en/introducing-the-google-wallet-api/
[3] Create passes on Web using the Google Wallet API https://codelabs.developers.google.com/add-to-wallet-web
[4] Authenticate requests to the Google Wallet API | Generic pass https://developers.google.com/wallet/generic/use-cases/auth
[5] Getting started:: Mobile Wallet - Google Wallet prerequisites – Emarsys https://help.emarsys.com/hc/en-us/articles/9480656105233-Getting-started-Mobile-Wallet-Google-Wallet-prerequisites
[6] Setting up a Google Wallet API Issuer account | Generic pass https://developers.google.com/wallet/generic/getting-started/issuer-onboarding
[7] Generating Google Wallet REST API authentication credentials https://developers.google.com/wallet/generic/getting-started/auth/rest
[8] Create and delete service account keys - IAM - Google Cloud https://cloud.google.com/iam/docs/keys-create-delete
[9] Wallet - Generic pass - Google for Developers https://developers.google.com/wallet/generic/overview/add-to-google-wallet-flow
[10] Set up Google Wallet API - Airship Docs https://docs.airship.com/guides/wallet/user-guide/project/manage-google-pass-certificates/
[11] Google Wallet API tutorial for Google Developers | Google I/O 2022 https://www.youtube.com/watch?v=2gTCghy-dU4
[12] Google Pay - Stripe Documentation https://docs.stripe.com/google-pay
[13] Google Wallet API - indigitall Documentation https://documentation.indigitall.com/docs/google-wallet-api
[14] Use the Google Wallet API - Console https://support.google.com/console/answer/11044296?hl=en
[15] Google Pay API & Google Pay & Wallet Console - Google Help https://support.google.com/console/answer/10914884?hl=en
[16] Google Pay - Mastercard https://na.gateway.mastercard.com/api/documentation/integrationGuidelines/supportedFeatures/pickPaymentMethod/devicePayments/GooglePay.html
[17] Newest 'google-wallet' Questions - Stack Overflow https://stackoverflow.com/questions/tagged/google-wallet
[18] Getting started:: Mobile Wallet - Voraussetzungen für Google Wallet https://help.emarsys.com/hc/de/articles/9480656105233-Getting-started-Mobile-Wallet-Voraussetzungen-f%C3%BCr-Google-Wallet
[19] google-wallet/pass-converter - GitHub https://github.com/google-wallet/pass-converter
[20] Service accounts overview | IAM Documentation - Google Cloud https://cloud.google.com/iam/docs/service-account-overview
[21] README.md - janirefdez/google-wallet-web - GitHub https://github.com/janirefdez/google-wallet-web/blob/main/README.md
[22] Add your Wallet Certificate - Overview https://docs.messangi.com/docs/add-your-wallet-certificate
[23] config.json - google-wallet/pass-converter · GitHub https://github.com/google-wallet/pass-converter/blob/main/config.json
[24] Set up Google Wallet for passes in Passcreator - Documentation https://support.passcreator.com/space/KB/23429133/Set+up+Google+Wallet+for+passes+in+Passcreator
[25] Wallet API - Airship Docs https://docs.airship.com/api/wallet/
[26] Google Wallet API onboarding guide https://developers.google.com/wallet/generic/getting-started/onboarding-guide
[27] Validate Google Wallet JSON - Stack Overflow https://stackoverflow.com/questions/78191341/validate-google-wallet-json
[28] How can I get the file "service_account.json" for Google Translate API? https://stackoverflow.com/questions/46287267/how-can-i-get-the-file-service-account-json-for-google-translate-api