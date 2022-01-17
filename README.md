```

╭━━╮╱╱╱╱╱╱╱╱╱╱╱╭━━━╮╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╭╮╱╱╱╱╱╭╮
┃╭╮┃╱╱╱╱╱╱╱╱╱╱╱┃╭━━╯╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱┃┃╱╱╱╱╱┃┃
┃╰╯╰┳━━┳━━┳┳━━╮┃╰━━┳━┳━━┳╮╭┳━━┳╮╭╮╭┳━━┳━┫┃╭╮╭━━┫╰━┳━━╮
┃╭━╮┃╭╮┃━━╋┫╭━╯┃╭━━┫╭┫╭╮┃╰╯┃┃━┫╰╯╰╯┃╭╮┃╭┫╰╯╯┃╭╮┃╭╮┃╭╮┃
┃╰━╯┃╭╮┣━━┃┃╰━╮┃┃╱╱┃┃┃╭╮┃┃┃┃┃━╋╮╭╮╭┫╰╯┃┃┃╭╮╮┃╰╯┃┃┃┃╰╯┃
╰━━━┻╯╰┻━━┻┻━━╯╰╯╱╱╰╯╰╯╰┻┻┻┻━━╯╰╯╰╯╰━━┻╯╰╯╰╯┃╭━┻╯╰┫╭━╯
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱┃┃╱╱╱╱┃┃
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╰╯╱╱╱╱╰╯
```
# Penggunaan
1. silahkan clone project ini ke folder htdocs
2. buat file .htaccess dan pastekan kode dibawah ini
```
RewriteEngine On

#website location
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^(.+)$ index.php?uri=$1 [QSA,L]
```
3. happy coding

# struktur direktori
```
htdocs           
├─ app                      
│  ├─ config.php            
│  ├─ globalconfig.php      
│  ├─ index.php             
│  ├─ link-css.php          
│  ├─ link-javascripts.php  
│  └─ route-config.php      
├─ assets                   
│  ├─ css                   
│  │  ├─ index.php          
│  │  └─ styles.css         
│  ├─ icon                  
│  │  ├─ favicon.ico        
│  │  └─ index.php          
│  ├─ img                   
│  │  └─ index.php          
│  ├─ js                    
│  │  ├─ index.php          
│  │  └─ myscripts.js       
│  └─ index.php             
├─ route                    
│  └─ route.php             
├─ views                    
│  ├─ 404.php               
│  ├─ home.php              
│  ├─ index.php             
│  └─ user.php              
├─ README.md                
└─ index.php                

```
# Tutorial
### Membuat tampilan home, dll
untuk membuat tampilan silahkan masukan ke folder views
```
|
├─ views
```
dengan cara membuat tampilan seperti biasa dengan html, berikut templatenya

```php
<!DOCTYPE html> 

<html>  
   <head> 
      <meta charset = "utf-8"> 
      <title>...</title>
      <?php include 'app/link-css.php';?>
   </head> 
  
   <body> 
      <?php include 'app/link-javascripts.php';?>
   </body> 
</html> 
```

### css
Basic Framework Php ini sudah dilengkapi dengan bootstrap v.5 tetapi jika anda ingin mengcostum css anda bisa menuliskannya pada file styles.css yang terletak pada direktori seperti dibawah ini
```
├─ assets                   
│  ├─ css                   
│  │  ├─ index.php          
│  │  └─ styles.css
```

### Javascript
jika anda ingin membuat javascript dan terpasang di semua page silahkan untuk menuliskan javascript anda ke file myscripts.js yang terletak pada direktori seperti dibawah ini **(sangat disarankan menggunakan function)**
```
│  ├─ js                    
│  │  ├─ index.php          
│  │  └─ myscripts.js 
```


### Membuat route
Setelah selesai membuat tampilan silahkan buat route pada file route.php yang terletak pada folder route

```
├─ route                    
│  └─ route.php
```
berikut syntax pembuatan route

```php
$route->add('/',$dir."home.php");
```
atau
```php
$route->add('/',"views/home.php");
```

### Penggunaan MySQL
Untuk Menggunakan mysql pertama anda harus mengedit dbhost, dbuser, dbpass, dbname pada file config.php pada direktori

```
htdocs           
├─ app                      
│  ├─ config.php
```
edit lah pada bagian seperti dibawah ini
```php
<?php

// lokasi file views
class Config {
  // Properties
  ...
  public $dbhost = 'localhost';
  public $dbuser = 'root';
  public $dbpass = '';
  public $dbname = 'example';
  ...
```
setelah itu anda harus mengedit file globalconfig.php untuk memanggil fungsi db di setiap page yang anda buat

```
htdocs           
├─ app                      
│  ├─ config.php            
│  ├─ globalconfig.php
```
yang harus anda lakukan ialah hilangkan tanda comment garis miring dua (//) pada 

```php
// $db = new db($conf->get_dbhost(), $conf->get_dbuser(), $conf->get_dbpass(), $conf->get_dbname());
```
menjadi
```php
$db = new db($conf->get_dbhost(), $conf->get_dbuser(), $conf->get_dbpass(), $conf->get_dbname());
```
### Penggunaan Query
masukan kode dibawah ini pada page yang anda buat di folder views seperti penggunaan database pada php native

#### Untuk mengambil sebuah data dari database
```php
$account = $db->query('SELECT * FROM accounts WHERE username = ? AND password = ?', 'test', 'test')->fetchArray();
echo $account['name'];
```

#### Untuk mengambil beberapa data dari database
```php
$accounts = $db->query('SELECT * FROM accounts')->fetchAll();

foreach ($accounts as $account) {
	echo $account['name'] . '<br>';
}
```

#### Untuk mengambil jumlah rows
```php
$accounts = $db->query('SELECT * FROM accounts');
echo $accounts->numRows();
```

#### Untuk menampilkan jumlah baris yang terpengaruhi
sangat berguna untuk mengetahui apakah query insert atau update berhasil atau tidak
```php
$insert = $db->query('INSERT INTO accounts (username,password,email,name) VALUES (?,?,?,?)', 'test', 'test', 'test@gmail.com', 'Test');
echo $insert->affectedRows();
```

#### Untuk menampilkan total query
```php
echo $db->query_count;
```

#### Untuk menampilkan id terakhir yang terinsert
```php
echo $db->lastInsertID();
```

#### Untuk menutup koneksi database
```php
$db->close();
```



