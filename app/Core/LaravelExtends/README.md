# removing public from url but still use asset()

- copy index.php to rrot folder, fix loading statements to new path
- extend Illuminate\Routing\UrlGenerator to override asset() method
- in AppServiceProvider use $this->app->extend('url') to return your own object instead og the laravel ones