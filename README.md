# Tugas-1 PBKK D

<div style="text-align:justify;">
Pada tugas pertemuan pertama ini, kita diminta untuk mengikuti tutorial yang telah diberikan pada classroom. Tutorial tersebut memberikan materi berupa blade pada Laravel 11. Berikut tampilan yang didapatkan setelah mengikuti tutorial yang diberikan:
</div>

<br>

<div>

1. Tampilan Home-Page
   ![Home-Page](img/home-page.png)

2. Tampilan Blog-Page
   ![Blog-Page](img/blog-page.png)

3. Tampilan About Page
   ![about-Page](img/about-page.png)

4. Tampilan Contact Page
![contact-Page](img/contact-page.png)
</div>

<div style="text-align:justify;">
Untuk mendapatkan hasil seperti diatas tentu saja kita membutuhkan 4 file blade yaitu

- [home.blade.php](laravel11/resources/views/home.blade.php)
- [blog.blade.php](laravel11/resources/views/blog.blade.php)
- [about.blade.php](laravel11/resources/views/about.blade.php)
- [contact.blade.php](laravel11/resources/views/contact.blade.php)

Kita juga harus membuat route untuk merepresentasikan url dari masing - masing file blade tersebut.

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home',['title' => 'Home']);
});

Route::get('/blog', function () {
    return view('blog',['title' => 'Blog']);
});
Route::get('/about', function () {
    return view('about',['title' => 'About'],['name'=>'Willyam']);
});
Route::get('/contact', function () {
    return view('contact',['title' => 'Contact']);
});
```

Kode tersebut memiliki arti jika kita mengakses **/(atau halaman utama)** maka kita akan diberikan tampilan dari file [home.blade.php](laravel11/resources/views/home.blade.php) begitu juga seterusnya.

Karena tampilan dari masing - masing page kita memiliki template navbar dan header yang sama, sehingga untuk menghindari duplikasi kode kita dapat memanfaatkan blade-component. Kita dapat membuat template navbar dan header menjadi sebuah file berbeda pada folder component menggunakan perintah

```bash
php artisan make:component Navbar
php artisan make:component Header --view
```

Setelah file Navbar dan Header telah berhasil dibuat, maka kita membuat potongan kode Navbar dan Header kita pada file tersebut. Berikut adalah template dari Navbar dan Header yang kita miliki:

- [navbar.blade.php](laravel11/resources/views/components/navbar.blade.php)
- [header.blade.php](laravel11/resources/views/components/header.blade.php)

Pada template navbar kita terdapat beberapa potongan kode yang seharusnya kita buat secara dinamis, seperti class active yang akan berganti - ganti sesuai dengan halaman yang saat ini sedang kita akses. Sehingga kita menggunakan potongan kode seperti berikut:

```php
:active="request()->is('/')
:active="request()->is('/blog')
:active="request()->is('/about')
:active="request()->is('/contact')
```

Potongan kode tersebut memiliki arti, bahwa hanya ketika mengakses halaman tersebut maka halaman tersebut akan memiliki class active.

Begitu juga untuk Header pada web kita juga memiliki template yang sama namun terdapat beberapa potongan kode yang harus kita buat secara dinamis, yaitu tulisan Home, Blog, About,Contact pada halaman atas kita.

Hal tersebut dilakukan dengan mempassing sebuah variabel (bernama title) yang dipasing melalui route pada [web.php](laravel11/routes/web.php).

```php
['title' => 'Home']
['title' => 'Blog']
['title' => 'About']
['title' => 'Contact']
```

Namun, variabel tersebut hanya bisa diakses oleh 4 file blade utama kita. Sehingga pada masing - masing file tersebut kita akan mempasing variabel tersebut dengan kode sebagai berikut:

```php
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
```

Variabel tersebut akan diteruskan pada file [layout.blade.php](laravel11/resources/views/components/layout.blade.php) yang akan diberikan pada file header kita dan dipanggil sebagai slot.

Berikut adalah potongan kode pada [layout.blade.php](laravel11/resources/views/components/layout.blade.php):

```php
<x-header> {{ $title }} </x-header>
```

Berikut adalah kode pada [header.blade.php](laravel11/resources/views/components/header.blade.php):

```html
<header class="bg-white shadow">
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $slot }}</h1>
  </div>
</header>
```

Component terakhir yang kita miliki adalah [layout.blade.php](laravel11/resources/views/components/layout.blade.php) yang merupakan template utama kita sehingga pada 4 file utama kita tidak perlu menduplikasikan kode yang sama secara berulang karena sudah menggunakan component layout yang telah kita buat.

```html
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100>
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://rsms.me/inter/inter.css">
@vite('resources/css/app.css')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<title>Home</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <x-header> {{ $title }} </x-header>
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>

```

- `<x-navbar>` berfungsi untuk memanggil template navbar pada layout kita
- `<x-header>` berfungsi untuk memanggil template header pada layout kita yang akan mempasing nilai variabel title dari route yang telah diberikan seperti sudah dijelaskan sebelumnya.
- `slot` yang akan menyimpan perubahan yang terdapat pada masing masing file blade kita secara dinamis. Pada kasus kita maka nilai slot tersebut berupa **Ini adalah halaman Home**,**Ini adalah halaman Blog**,dan seterusnya.

</div>

# Tugas-2 PBKK D

<div style="text-align:justify;">
Pada tugas pertemuan kedua ini, kita diminta untuk membuat sebuah model yang akan mengirimkan data untuk kita tampilkan pada view post(article-page). Data yang kita miliki disimpan dalam sebuah model sehingga efektif karena tidak ada duplikasi penulisan kode.
</div>

<br>

<div>

1. Tampilan Blog-Page (Update)
   ![Blog-Page](<img/blog-page(2).png>)

2. Tampilan Article-Page
   ![Artikel-1](img/artikel1.png)

   ![Artikel-2](img/artikel2.png)
   </div>

<div style="text-align:justify;">
Langkah pertama yang perlu kita lakukan yaitu membuat sebuah model, yang akan menyimpan data artikel yang akan kita tampilkan. Kita perlu membuat sebuah class bernama Post yang akan menjadi model kita.
</div>

```php

<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Sandhika Galih',
                'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit, fugit dignissimos
                accusantium corrupti dicta
                voluptatem consectetur sed aliquam in ratione, neque modi voluptatum pariatur quis? Ad maiores neque tempora
                impedit.'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Sandhika Galih',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ab amet distinctio
                iusto facere ullam doloremque corporis nihil et quia odio modi, maiores eius. Commodi enim laudantium
                voluptates cumque eum.'
            ]
        ];
    }

    public static function find($slug):array
    {
        $post= Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

        if(!$post){
            abort(404);
        }
        return $post;
    }
}

?>

```

<div style="text-align:justify;">

Pada class Post ini terdapat 2 fungsi yaitu fungsi **all()** dan fungsi **find()**. Berikut penjelasan dari masing - masing fungsi tersebut:

- `Fungsi all()`: berfungsi untuk menyimpan semua data artikel yang kita miliki.

- `Fungsi find()`: berfungsi untuk mengembalikan artikel sesuai dengan nilai slug yang diberikan.

**Slug** disini berfungsi sebagai identitas pengenal dari masing - masing artikel yang unique. Slug juga akan menjadi url dari masing - masing artikel yang kita miliki sebagai contoh dalam kasus artikel 1 maka url dari artikel tersebut yaitu `posts/judul-artikel-1`

Agar class Post kita dapat diakses oleh route yang kita miliki maka kita perlu menambahkan namespace. Sehingga pada route kita dapat menambahkan `use App\Models\Post;` agar dapat mengakses class Post yang telah kita buat pada model.

Pada fungsi find kita juga dapat menambahkan logika percabangan untuk mengatasi url yang tidak sesuai. Kita menggunakan fungsi abort yang telah disediakan oleh laravel sehingga ketika url yang diberikan tidak sesuai maka akan mengembalikan tampilan **page not found**

![page-not-found](img/page-not-found.png)

</div>

<div style="text-align:justify;">

Kita juga perlu menambahkan sebuah variabel pada route posts (sebelumnya merupakan route blog) untuk menyimpan semua artikel yang kita miliki dalam model. Kita menggunakan fungsi **all()** untuk mengembalikan semua artikel lalu menyimpannya ke dalam variabel posts.

```php

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

```

Kemudian kita menampilkannya ke dalam view posts menggunakan **@foreach** lalu memasukan nilai dari array post yang kita miliki. Penggunaan foreach digunakan agar tidak terdapat duplikasi dalam penulisan kode.

```html
<x-layout>
  <x-slot:title> {{ $title }} </x-slot:title>
  @foreach ($posts as $post)
  <article class="py-8 max-w-screen-md border-b border-gray-300">
    <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
      <h2 class="font-bold mb-1 text-3xl tracking-tight text-gray-900">
        {{ $post['title'] }}
      </h2>
    </a>
    <div class="text-base text-gray-500 hover:underline">
      <a href="#"> {{ $post['author'] }} | 1 January 2024 </a>
    </div>
    <p class="my-4 font-light">{{ Str::limit($post['body'], 150) }}</p>
    <a
      href="/posts/{{ $post['slug'] }}"
      class="font-medium text-blue-500 hover:underline"
      >Read More &raquo;</a
    >
  </article>
  @endforeach
</x-layout>
```

Kemudian untuk navigasi dari masing - masing artikel, kita akan mempassing nilai dari masing - masing slug yang dimiliki oleh artikel sebagai contoh `posts/judul-artikel-1`. Namun, kita sebelumnya kita perlu menambahkan route yang akan menyimpan nilai slug yang telah dipassing sebelumnya.

</div>

```php

Route::get('/posts/{slug}', function ($slug) {
    $post = Post::find($slug);


    return view('post',['title' => 'Article','post' => $post]);
});

```

<div style="text-align:justify;">

Dalam kode tersebut terlihat bahwa semua url yang tertulis setelah **/posts** akan disimpan ke dalam slug. Lalu kita memanfaatkan slug tersebut untuk digunakan ke dalam fungsi **find()** di dalam class Post yang telah kita buat. Setelah kita mendapatkan nilai dari fungsi **find()** kita akan memanggil sebuah view yang akan menampilkan artikel sesuai slug yang telah diberikan. Berikut adalah potongan kode dari view post:

```html
<x-layout>
  <x-slot:title> {{ $title }} </x-slot:title>
  <article class="py-8 max-w-screen-md">
    <h2 class="font-bold mb-1 text-3xl tracking-tight text-gray-900">
      {{ $post['title'] }}
    </h2>
    <div class="text-base text-gray-500 hover:underline">
      <a href="#"> {{ $post['author'] }} | 1 January 2024 </a>
    </div>
    <p class="my-4 font-light">{{ $post['body'] }}</p>
    <a href="/posts" class="font-medium text-blue-500 hover:underline"
      >&laquo; Read More</a
    >
  </article>
</x-layout>
```

View post ini akan menampilkan artikel sesuai dengan nilai slug yang telah dipassing pada route.

</div>
