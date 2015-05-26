### KLU Certificate Manager App

* Kullanıcı giriş sayfası


#### Kullanıcı giriş sayfası

* __CSS:__ `/app/public/css/login.css`
* __TEMPLATE:__ 
    * Ana: `/app/resources/views/login.blade.php`
        * Kimlik doğrulama: `/app/resources/views/partials/dogrulama.blade.php`
        * Son kurslar: `/app/resources/views/partials/sonkurslar.blade.php`
    * Giriş: `/app/resources/views/auth/login.blade.php`
    * Üye olma: `/app/resources/views/auth/register.blade.php`
    * Şifre sıfırlama: `/app/resources/views/auth/reset.blade.php`
    * Şifremi unuttum: `/app/resources/views/auth/password.blade.php`
* __CONTROLLER:__ Kullanıcı yönetimi Laravel ile beraber gelmekte, biz sadece bazı değişiklikler yapıyoruz. Mesela, email girişi yerine öğrenci numarayla giriş yapmak gibi.
    * `/app/Http/Controller/Auth/AuthController.php`
    * `/app/Http/Controller/Auth/PasswordController.php`

##### Son görüntülenen kursları değiştirmek

Görüntülenen son 3 kursumuz bir _action_'a değilde bir ana _template_ bağlı olduğundan, diğerleri gibi _Controllers_ klasında değilde _Providers_ klasında bulunmakta. Bu _template_ nerede kullanılırsa kullanılsın, ordan verilerimize ulaşabileceğiz. Öbür şekilde, her sayfa için ayrı ayrı belirleyecektik. [Laracasts](https://laracasts.com/series/laravel-5-fundamentals)

`/app/Http/Providers/AppServiceProvider.php`

__login.blade.php__ _template_'mızda __$courses__ değişkenine erişebileceğiz.

```php
public function boot()
{
    view()->composer('login', function($view) {
        $view->with('courses', \App\Course::orderBy('created_at', 'desc')->limit(3)->get());
    });
}
```

`/app/resources/views/login.blade.php`

```blade
@foreach($courses as $course)
    <h1>{ $course->title }</h1>
@endforeach
```