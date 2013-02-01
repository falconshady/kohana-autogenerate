# Kohana AutoGenerate

	Incomplete module, in initial stage.

This module add resources (Scaffolds, Controllers, ORMs, Views) with Kohana através of Web interface com layout baseado no bootstrap do twitter.

## Requirements

* [Kohana v3.3]
* [Kohana Database]
* [Kohana ORM]
* [Bootstrap from Twitter](http://twitter.github.com/bootstrap/) >= 2

## Usage

	copy kohana-generate/ modules/kohana-generate/
	Edit the application/boostrap.php...
	kohana::modules(array(..."kohana-generate" => MODPATH.'kohana-generate',...));
	Access in browser ...
	http://localhost/seu-app/autogenerate/


### Create ORM example

	http://localhost/seu-app/autogenerate/orm
	Nome da classe: Product
	Fields: name:string price:decimal(7,2) belongs_to:category:Category
	Nome da classe: Category
	Fields: name:string has_many:products:Product
	Nome da classe: Order
	Fields: belongs_to:user:User has_many:order_items:Order_Item
	Nome da classe: Order_Item
	Fields: count:integer belongs_to:order:Order belongs_to:product:Product
	Nome da classe: Order_Payment_Type
	Fields: belongs_to:order:Order many_many:payment_types:Payment_Type:orders_paymenttypes
	Nome da classe: Payment_Type
	Fileds: name:string many_many:orders:Order_Payment_Type:orders_paymenttypes


With Kohana-AutoGenerate you have generate code for your system. Caso os controllers, models e views j� existam, eles ser�o re-escritos.

## Initial Release

* Generate models ORM

# Future Releases

* Generate controllers
* Generate views
* Generate migrations
* Generate tables in database
* Edit code in browser
* Integration with GIT with shell (console/terminal)
* Gerar c�digo de m�dulos da mesma forma que gera para application
