# Guide: Create a Certifictate for Apple Wallet in Your Apple Developer Account

Um an Ihre .p12-Zertifikatsdatei für Apple Wallet zu gelangen und den Apple Pass Identifier herauszufinden, folgen Sie diesen Schritten:

## .p12-Zertifikatsdatei erstellen

1. Melden Sie sich in Ihrem Apple Developer Account an (https://developer.apple.com)[1].

2. Navigieren Sie zu "Certificates, Identifiers & Profiles"[3].

3. Unter "Identifiers", wählen Sie "Pass Type IDs" und klicken Sie auf das "+"-Symbol, um eine neue Pass Type ID zu registrieren[4].

4. Geben Sie eine Beschreibung und einen Identifier ein (z.B. pass.com.ihrefirma.appname)[4].

5. Gehen Sie zu "Certificates" und klicken Sie auf "Create Certificate"[4].

6. Erstellen Sie eine Certificate Signing Request (CSR) auf Ihrem Mac mit Keychain Access[3].

7. Laden Sie die CSR-Datei hoch und generieren Sie das Zertifikat[3].

8. Laden Sie das generierte .cer-Zertifikat herunter und öffnen Sie es mit Keychain Access[3].

9. Exportieren Sie das Zertifikat und den privaten Schlüssel als .p12-Datei:
    - Wählen Sie das Zertifikat und den privaten Schlüssel aus
    - Gehen Sie auf "File" > "Export Items"
    - Wählen Sie das Format "Personal Information Exchange (.p12)"
    - Vergeben Sie ein sicheres Passwort[3][4]

## Apple Pass Identifier finden

1. Der Apple Pass Identifier ist die Pass Type ID, die Sie in Schritt 4 erstellt haben[5].

2. Sie können ihn auch in Ihrem Zertifikat unter "User ID" finden[5].

3. Das Format ist typischerweise: pass.com.ihrefirma.appname[6]

## Team ID finden

1. Öffnen Sie Keychain Access und wählen Sie Ihr Zertifikat aus[5].

2. Gehen Sie auf "File" > "Get Info" und suchen Sie nach "Organizational Unit" unter "Details"[5].

3. Dies ist Ihre Team ID[5].

Bewahren Sie die .p12-Datei, das Passwort, die Pass Type ID und die Team ID sicher auf. Sie benötigen diese Informationen zum Signieren Ihrer Apple Wallet Pässe[4][6].

Quellen
[1] how do I create an p12 and mobileprovision certificate https://forums.developer.apple.com/forums/thread/729492
[2] How to create Apple PKPass .p12 certificate using Linux - GitHub Gist https://gist.github.com/rlanyi/f3edad3bd2f1753a937f8a0c6182d55a
[3] Create an iOS Distribution Certificate (P12) - Purple Experience https://docs.purplepublish.com/experience/create-an-ios-distribution-certificate-p12
[4] Creating a Pass Type ID & Pass Signing Certificate - WalletThat https://www.walletthat.com/help/creating-a-pass-type-id-pass-signing-certificate/
[5] Wallet Developer Guide: Building Your First Pass https://developer.apple.com/library/archive/documentation/UserExperience/Conceptual/PassKit_PG/YourFirst.html
[6] What is Pass Type ID - Passworks - Documentation https://help.passworks.io/pass-type-ids
[7] NFC Tutorial: How to Create Apple Pass Type IDs - PassNinja https://www.passninja.com/tutorials/apple-platform/how-to-create-apple-pass-type-ids
[8] Create Wallet identifiers and certificates - Configure capabilities https://developer.apple.com/help/account/configure-app-capabilities/create-wallet-identifiers-and-certificates/
[9] Creating an Apple Pay Certificate File (.p12) - SAP Help Portal https://help.sap.com/docs/SAP_CUSTOMER_CHECKOUT/91f74f5d95324aec9bfa5e7c277f5cc2/c5b583c90c1648ce85bdda7a8728aa10.html
[10] Just got an official $99 paid Apple dev account, how to get my p12 ... https://www.reddit.com/r/sideloaded/comments/1eala05/just_got_an_official_99_paid_apple_dev_account/
[11] Apple Distribution Certificate and p12 - Apple Developer Forums https://forums.developer.apple.com/forums/thread/695752
[12] how to download p12 certificate and mobileprovision file : r/sideloaded https://www.reddit.com/r/sideloaded/comments/17yb5rg/how_to_download_p12_certificate_and/
[13] Getting started:: Mobile Wallet - Voraussetzungen für Apple Wallet https://help.emarsys.com/hc/de/articles/9480146990353-Getting-started-Mobile-Wallet-Voraussetzungen-f%C3%BCr-Apple-Wallet
[14] Creating a .p12 Certificate File for Apple Wallet Integration https://help.sap.com/docs/SAP_CUSTOMER_CHECKOUT/8f711df7d2aa4f1aa29f88c86cef2081/2bc3684189bf49e59380074585cce17d.html?version=2.0.20
[15] iOS: p12 Generate Certificates - OneSignal Documentation https://documentation.onesignal.com/docs/ios-p12-generate-certificates
[16] iOS - Creating a Distribution Certificate and .p12 File https://support.magplus.com/hc/en-us/articles/203808748-iOS-Creating-a-Distribution-Certificate-and-p12-File
[17] How to create Apple Push Notification Certificate (.p12) https://support.servicenow.com/kb?id=kb_article_view&sysparm_article=KB1506609
[18] Pass.Locations | Apple Developer Documentation https://developer.apple.com/documentation/walletpasses/pass/locations-data.dictionary
[19] Pass Type IDs Entitlement | Apple Developer Documentation https://developer.apple.com/documentation/bundleresources/entitlements/com.apple.developer.pass-type-identifiers
[20] Pass | Apple Developer Documentation https://developer.apple.com/documentation/walletpasses/pass
[21] Apple wallet pass type ID - Stack Overflow https://stackoverflow.com/questions/57724513/apple-wallet-pass-type-id
[22] Creating the Source for a Pass | Apple Developer Documentation https://developer.apple.com/documentation/walletpasses/creating-the-source-for-a-pass
[23] Adding a Certificate - PassKit Support Center https://help.passkit.com/en/articles/3631930-adding-a-certificate
[24] passTypeIdentifier | Apple Developer Documentation https://developer.apple.com/documentation/passkit/pkpass/passtypeidentifier
[25] Link to Your App From the Back of an Apple Wallet Pass - Airship Docs https://docs.airship.com/guides/wallet/user-guide/project/app-id/
[26] Remove Pass Type Identifier (Apple Certificates) - ios - Stack Overflow https://stackoverflow.com/questions/77440484/remove-pass-type-identifier-apple-certificates
[27] Updating a Pass Type ID - Passworks - Documentation https://help.passworks.io/updated-pass-type-id
[28] How to create P12 certificate for iOS distribution - Stack Overflow https://stackoverflow.com/questions/9418661/how-to-create-p12-certificate-for-ios-distribution
[29] How to Generate a P12 Certificate for Signing an iOS App - Appdome https://www.appdome.com/how-to/devsecops-automation-mobile-cicd/automated-signing-secured-android-ios/generate-p12-certificate-for-signing-ios-app/
[30] Trouble generating a p12 certificate for wallet signing - Ask Different https://apple.stackexchange.com/questions/394197/trouble-generating-a-p12-certificate-for-wallet-signing
[31] Creating the iOS Distribution Certificate - Flip Support https://support.getflip.com/hc/de/articles/26933071593105-Creating-the-iOS-Distribution-Certificate
[32] Find saved passwords and passkeys on your iPhone - Apple Support https://support.apple.com/en-us/104955
[33] Wallet Developer Guide: Pass Design and Creation https://developer.apple.com/library/archive/documentation/UserExperience/Conceptual/PassKit_PG/Creating.html
[34] Creating/renewing your Pass Type ID certificates for Apple Wallet https://helpcenter.splio.com/kb/guide/en/creating-renewing-your-pass-type-id-certificates-for-apple-wallet-WDUBWOiHtM/Steps/3335068