<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register','RegisterController@saveCustomer');
Route::resource('patient','PatientController');
Route::get('/test', function() {

	$phpWord = new \PhpOffice\PhpWord\PhpWord();

	// Every element you want to append to the word document is placed in a section.
	// To create a basic section:
	$section = $phpWord->addSection();

	// After creating a section, you can append elements:
	$section->addText('Hello world!');

  $section->addText('Dhamecha Rahul');

	// You can directly style your text by giving the addText function an array:
	$section->addText('Hello world! I am formatted.',
	    array('name'=>'Tahoma', 'size'=>16, 'bold'=>true));
      $section->addText('Dhamecha Rahul Kanjibhai','400',
    	    array('name'=>'Tahoma', 'size'=>16, 'bold'=>true,'align'=>"center"));
	// If you often need the same style again you can create a user defined style
	// to the word document and give the addText function the name of the style:
	$phpWord->addFontStyle('myOwnStyle',
	    array('name'=>'Verdana', 'size'=>14, 'color'=>'63cbcb'));
	$section->addText('Hello world! I am formatted by a user defined style',
	    'myOwnStyle');

	// You can also put the appended element to local object like this:
	$fontStyle = new \PhpOffice\PhpWord\Style\Font();
	$fontStyle->setBold(true);
	$fontStyle->setName('Times New Roman');
	$fontStyle->setSize(50);
	$myTextElement = $section->addText('This demo World!');
	$myTextElement->setFontStyle($fontStyle);
  $fileName = date('Y-m-d').'Rahul';
  $folder = "Rahul";

	// Finally, write the document:
        // The files will be in your public folder
	$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
	$objWriter->save($fileName.'.docx');

  File::makeDirectory('css/'.$folder, 0775, true);
	$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'RTF');
	$objWriter->save('css/'.$folder.'/helloWorld.rtf');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
