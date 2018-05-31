# Laravel Make

This package allows you to use the laravel make commands outside of a laravel application, this can be very useful
for package development.

## Installing Globally

To install the package globally run `composer global require michaeljennings/laravel-make`.

When composer has finished installing you should be able to `laravel-make` in your command line and it should list all
of the available commands.

If you are on windows and it says `laravel-make` is not a function then make sure your global composer .bin directory
is in the $PATH environment variable.

## Installing Per Project

To install on a per project basis run `composer require phpunitmichaeljennings/laravel-make`.

Or add the package to you `composer.json` file.

```json
{
  ...
  "require-dev": {
    "michaeljennings/laravel-make": "~1.0",
  },
  ...
}
```

Then run `composer update` to install the package.

Once installed run `vendor/bin/laravel-make` and you should see a list of all of the available commands.

## Configuration

By default the laravel commands try to place the new files within the `app` directory and in the `App` namespace, however
this is very rarely how a package is setup.

To get around this you can create a `.laravel-make` file in the root of your package and define your package specific 
configuration in it. This file works like a `.env` file, a sample file is below, and then there is a description of each
configuration option underneath.

```text
BASE_PATH=/src
BASE_NAMESPACE=Example\Package
USER_MODEL=Example\Package\Models\User
```

### Base Path

The base path that will be prepended to all files, excluding migrations and seeders. 

Defaults to `/app`

```text
BASE_PATH=/src
```

### Base Namespace

This is the root namespace that will be prepended to each class. 

Defaults to 'App\'

```text
BASE_NAMESPACE=Example\Package
```

### User Model

This option is a little strange. Some of the stubs need to the path to the user model for the application, by default
laravel tries to find this from the auth config file. As we don't have the auth config file available to us we have
to specify it in the `.laravel-make` file.

Defaults to 'App\User' 

```text
USER_MODEL=Example\Auth\Models\User
```

### Console Command Path

The path the command files should be stored in. By default this will prepend the base path. 

Defaults to '{BASE_PATH}/Console/Commands'

```text
CONSOLE_COMMAND_PATH=src/Commands
```

### Console Command Namespace

The namespace that will be prepended to all console commands. 

Defaults to '{BASE_NAMESPACE}\Console\Commands'

```text
CONSOLE_NAMESPACE=Example\Package\Commands
```

### Controller Path

The path the controller files should be stored in. By default this will prepend the base path. 

Defaults to '{BASE_PATH}/Http/Controllers'

```text
CONTROLLER_PATH=src/Controllers
```

### Controller Namespace

The namespace that will be prepended to all controllers. 

Defaults to '{BASE_NAMESPACE}\Http\Controllers'

```text
CONTROLLER_NAMESPACE=Example\Package\Controllers
```

### Event Path

The path the event files should be stored in. By default this will prepend the base path. 

Defaults to '{BASE_PATH}/Events'

```text
EVENT_PATH=src/Events
```

### Event Namespace

The namespace that will be prepended to all events. 

Defaults to '{BASE_NAMESPACE}\Events'

```text
EVENT_NAMESPACE=Example\Package\Events
```

### Listener Path

The path the listener files should be stored in. By default this will prepend the base path. 

Defaults to '{BASE_PATH}/Listeners'

```text
LISTENER_PATH=src/Listeners
```

### Listener Namespace

The namespace that will be prepended to all listeners. 

Defaults to '{BASE_NAMESPACE}\Listeners'

```text
LISTENER_NAMESPACE=Example\Package\Listeners
```

### Mail Path

The path the mail files should be stored in. By default this will prepend the base path. 

Defaults to '{BASE_PATH}/Mail'

```text
MAIL_PATH=src/Mail
```

### Mail Namespace

The namespace that will be prepended to all mail classes. 

Defaults to '{BASE_NAMESPACE}\Mail'

```text
MAIL_NAMESPACE=Example\Package\Mail
```

### Middleware Path

The path the middleware files should be stored in. By default this will prepend the base path. 

Defaults to '{BASE_PATH}/Middleware'

```text
MIDDLWARE_PATH=src/Middleware
```

### Middleware Namespace

The namespace that will be prepended to all middleware classes. 

Defaults to '{BASE_NAMESPACE}\Middleware'

```text
MIDDLWARE_NAMESPACE=Example\Package\Middleware
```

### Migration Path

The path the migration files should be stored in. By default this will prepend the base path. 

Defaults to 'database/migrations'

```text
MIGRATION_PATH=migrations
```

### Model Path

The path the model files should be stored in. By default this will prepend the base path. 

Defaults to '{BASE_PATH}'

```text
MODEL_PATH=src/Models
```

### Model Namespace

The namespace that will be prepended to all models. 

Defaults to '{BASE_NAMESPACE}\Models'

```text
MODEL_NAMESPACE=Example\Package\Models
```

### Notification Path

The path the notification files should be stored in. By default this will prepend the base path. 

Defaults to '{BASE_PATH}/Notifications'

```text
NOTIFICATION_PATH=src/Notifications
```

### Notification Namespace

The namespace that will be prepended to all notifications. 

Defaults to '{BASE_NAMESPACE}\Notifications'

```text
NOTIFICATION_NAMESPACE=Example\Package\Notifications
```

### Policy Path

The path the policy files should be stored in. By default this will prepend the base path. 

Defaults to '{BASE_PATH}/Policies'

```text
POLICY_PATH=src/Policies
```

### Policy Namespace

The namespace that will be prepended to all policies. 

Defaults to '{BASE_NAMESPACE}\Policies'

```text
POLICY_NAMESPACE=Example\Package\Policies
```

### Provider Path

The path the provider files should be stored in. By default this will prepend the base path. 

Defaults to '{BASE_PATH}/Providers'

```text
PROVIDER_PATH=src/Providers
```

### Provider Namespace

The namespace that will be prepended to all providers. 

Defaults to '{BASE_NAMESPACE}\Providers'

```text
PROVIDER_NAMESPACE=Example\Package\Providers
```

### Request Path

The path the request files should be stored in. By default this will prepend the base path. 

Defaults to '{BASE_PATH}/Requests'

```text
REQUEST_PATH=src/Requests
```

### Request Namespace

The namespace that will be prepended to all requests. 

Defaults to '{BASE_NAMESPACE}\Requests'

```text
REQUEST_NAMESPACE=Example\Package\Requests
```

### Seeder Path

The path the seeder files should be stored in. By default this will prepend the base path. 

Defaults to 'database/seeds'

```text
SEEDER_PATH=seeds
```