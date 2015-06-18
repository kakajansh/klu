### KLU Certificate Manager App

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

##### Genel bakış

* Kullanıcı giriş sayfası
* Sertifikalar
* Kurslar
* Öğrenciler
* Kullanıcı profil
* Sertifika doğrulama

##### Eklentiler

| Adi | Aciklama |
|--------------------|-----------------------|
| tecnik             | PHP ile PDF oluşturma düzenleme |
| fdpi               | Var olan PDF dosyasını açma değiştirme |


* [tecnick.com/tcpdf] - PHP ile PDF oluşturma düzenleme - 
* [setasign/fpdi] - Var olan PDF dosyasını açma değiştirme - 
* [maatwebsite/excel] - Excel dosyasını içe aktarma - 
* [efficiently/authority-controller] - Kullanıcı yetki kontrolü -
* [ircmaxell/random-lib] - Random sayı oluşturma - 

* [Demo](http://certificate.byethost5.com)
    * __Admin için:__ _admin:foobar_
    * __Normal kullanıcı için__ _321:111_


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
