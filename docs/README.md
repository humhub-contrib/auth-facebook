# Facebook Sign-In

Using this module, users can directly log in or register with their Facebook credentials at this HumHub installation. 
A new button "Facebook" will appear on the login page.

## Configuration

Please follow the [Facebook instructions](https://developers.facebook.com/docs/facebook-login/overview) to create a Facebook app with the **Facebook Login** product and get its `App ID` and `App Secret`.

Enter the **App ID** as **Client ID** and the **App Secret** as **Client secret** in the module configuration at: `Administration -> Modules -> Facebook Sign-In -> Configure`.
This page also displays the `Redirect URI`, which must be added in Facebook as a `Valid OAuth Redirect URI`.

## Requirements
- PHP 8.2+
- `allow_url_fopen` **MUST** be enabled.
