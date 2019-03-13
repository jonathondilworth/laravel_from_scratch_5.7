# laravel_from_scratch_5.7

Laravel From Scratch (Laracasts Tutorial Series)

## Table of Contents

**TODO**

* Laravel Template Engine: Blade
*  

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

**Escaping data: `{!! $var !!}`**

