# laravel_from_scratch_5.7

Laravel From Scratch (Laracasts Tutorial Series)

## Initial Note From Author

This repo contains a project that I have followed along with from Laracasts.com. If you would like great educational resources for PHP Laravel and other technologies, please visit laracasts.com, [click here](https://laracasts.com/) to open laracasts.

The purpose of the repo is to continually upload updated notes and project files on various branches as I progress through the series. If there are any issues associated with copyright claims or IP, I am happy to make this repo private on request from the original content creator. Feel free to e-mail me at: [jon@dilworth.me](mailto:jon@dilworth.me).

## Table of Contents

**Lesson 1,2,3,4,5**
* Laravel Template Engine: Blade
* Routes and passing data to views via routes.

**Lesson 6**
* Passing data to views via controllers.
* Controller generation using php artisan.

**Lesson 7**
* creating migrations

### Lesson 1,2 3 and 4:

Elementary material, basic routing and an introduction to Laravels templating engine called **Blade**. Blade files are typically found within the ***resources/views/.*** directory and are similar to other templating languages (or engines) such as Jinga2. Jinga2 is a templating language I have a fair amount of experience with, as [EWPs website](https://ewp.dilworth.me) is built using Jekyll and Jinga2 - meaning blade feels quite natural to me.

#### Important Notes

Regarding the Laravel **blade** templating engine, declaring sections can be accomplished in root templates in the following fashion:

    @yield('section_name', 'section_default_text')

Then within child templates, you must include `@extends('parent_template_name')`, followed by:

    @section('section_name')
    <!-- SECTION CONTENT GOES HERE -->
    @endsection('section_name')

Alternatively, if you only need to include a small amount of content, you can use the shorthand `@section('short_section', 'this is a shorthand method')`. This is useful when dealing with title tags, for example:

**layout.blade.php**

    <!DOCTYPE html>
    <html>
      <head>
        <title>@yield('page_title', 'Website | Default')</title>
      </head>
      <body>
        @yield('page_content')
      </body>
    </html>

**page.blade.php**

    @extends('layout')
    @section('page_title', 'Site | Shorthand Example')
    @section('page_content')
    <!-- SECTION COTENT GOES HERE -->
    @endsection('page_content')

### Lesson 5

Regarding routes in a little more detail and passing data to views.

#### Important Notes

Remember you can always use `compact('variable_name')` to easily pass data to views:

    Route::get('/', function() {
      $passthroughData = [ ... ];
      return view('view_name', compact('passthroughData'));
    });

**It is also possible to use the mustrash braces to echo variables. `<?= $var ?>` is equivalent to: `{{ $var }}`.**

The above will automatically escape the data contained with $var, in order to print the contents of $var, regardless of its intent (malicious or non-malicious), use the following notion: **`{!! $var !!}`**

**Passing data to views using ->with() and variants:**

    return view('view_name')->withName($name);

The above will pass a variable called 'Name' with the payload $name, specified by the parameter. Here are some alternative methods:

    return view('view_name')->with([
      'key' => 'value',
      'another_key' => [
        'ds_value_1',
        'ds_value_2',
      ],
    ]);

However, I don't see how this is any different from:

    return view('view_name', [
      'key' => 'value',
      ...
    ]);

*Note: Check to see the implementation of ->with and simply passing parameters inline through view and identify the differences. Document them here.. TODO*

*Had a quick look through the source code, did a search for response.php, there is a base response, then a HttpResponse that extends the base. A high level response implements a trait that allows for ->with(), something like that.. I'll get back to this..*

### Lesson 6: Controllers

This one is fairly straight forward. To generate a controller:

    php artisan make:controller ExampleController

Generates some boilerplate for a controller. Then in the routes file you can do something like this:

    Route::get('/', 'ExampleController@home');
    Route::get('/about', 'ExampleController@about');
    Route::get('/contact', 'ExampleController@contact');

This assumes that the `ExampleController` contains the following methods:

* home (public)
* about (public)
* contact (public)

The logic that renders the view that was originally contained within the routes file (web.php) can be migrated to these controller actions and the same behaviour can be achieved. It's just nicer using a controller as one decouples the responsibility for the logic associated with rendering a view from the routes file and moves it to a controller, which is more appropriate.

### Lesson 7: Databases, Migrations

Okay, so I ran into some trouble here.. I downloaded the latest version of mySQL, which is v8.x. I'm also a sequelPro user and there appears to be some compatability issues with SequelPro and the latest version(s) of mySQL. I originally thought this was due to the authentication mode, but even after enabling legacy authentication, I was still having issues where SequelPro would just crash. So, if you're following along in a similar manner, I would advise (at this time) you to download 5.7 instead of 8.x (mySQL), if you're using SequelPro on a Mac. **We even had this issue in work, and one of the guys literally changed to workbench because of it.** As this is just for educational purposes (and I'm not going to be running mySQL 8.x in production on my pet projects anyway), I'm just going to stick with 5.7.x.

**Migrations**

    php artisan migrate
    php artisan migrate:rollback
    php artisan migrate:fresh

Just check out all the migrations when you run `php artisan` and choose the appropriate one.

**Types of Migration**

Making migrations:

    php artisan make:migration create_examples_table

The above will generate some boilerplate for a 'creation' migration. I believe you can do the same with updates, etc. Deletes are rollbacks. Review documentation for more details.

*Fairly standard stuff, very similar to Yii2.*