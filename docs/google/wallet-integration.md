# Guide: Create a New App for Google Wallet in Your Google Developer Account

## Steps to Create the App

### 1. Log in to the Google Cloud Console
- Visit the [Google Cloud Console](https://console.cloud.google.com/).
- Log in with your Google Developer account.

### 2. Create a New Project
- Click on **"Create Project"**.
- Enter a project name (e.g., `Google Wallet Integration`) and select an organization if needed.
- Click **"Create"**.

### 3. Enable the Google Wallet API
- Open your new project in the Cloud Console.
- Navigate to **APIs & Services** > **Library**.
- Search for **"Google Wallet API"** and enable it.

### 4. Create a Service Account
- Go to **IAM & Admin** > **Service Accounts**.
- Click **"Create Service Account"**.
- Enter a name for the service account (e.g., `Wallet Service Account`).
- Assign the role **Project > Owner**.
- Download the generated JSON key.  
  *This key will be required to connect your app to the API and contains also the private key. You need to copy them to your private-key.pem*

### 5. Configure App Details for Google Wallet
- Go to the [Google Pay & Wallet Console](https://pay.google.com/business/console).
- Select your project and navigate to **Passes API**.
- Register the desired **Pass Types** (e.g., loyalty cards, gift cards, tickets).

### 6. Set Up OAuth 2.0
- In the Cloud Console, go to **APIs & Services** > **Credentials**.
- Create OAuth client credentials for accessing the Google Wallet API.

### 7. Test the Integration (Sandbox Mode)
- Google provides a **sandbox environment** to test your Wallet integration.
- In the [Google Pay & Wallet Console](https://pay.google.com/business/console), enable the **Sandbox Mode**.
- Create test data like digital passes or cards and verify that they are generated correctly.

### 8. Integrate with Your Website
- Use the [Google Wallet API Documentation](https://developers.google.com/wallet) to:
    - Generate passes.
    - Integrate them into your website.
- Utilize the SDKs or REST APIs provided by Google.

### 9. Submit for Review
- Before going live, your integration may require approval from Google.
- Submit your app for review in the **Wallet Console**.