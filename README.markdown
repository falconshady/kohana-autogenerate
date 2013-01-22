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
	Altere o application/boostrap.php...
	kohana::modules(array(..."kohana-generate" => MODPATH.'kohana-generate',...));
	Accesse in navigator ...
	http://localhost/seu-app/autogenerate/


### Create ORM example

	http://localhost/seu-app/autogenerate/orm
	Nome da classe: Product
	Fields: name:string price:decimal(7,2) belongs_to:category:Category
	Nome da classe: Order
	Fields: belongs_to:user:User has_many:order_items:Order_Item
	Nome da classe: Order_Item
	Fields: count:integer belongs_to:order:Order belongs_to:product:Product


Com o Kohana-Generate voc� pode gerar c�digo para o seu sistema. Caso os controllers, models e views j� existam, eles ser�o re-escritos.

## Funcionalidades Iniciais

* Gerar migrations
* Gerar as tabelas no banco de dados relacionadas �s migrations
* Gerar controllers, models e views baseados nas migrations existentes

# Funcionalidades Futuras

* Gerar c�digo de m�dulos da mesma forma que gera para application
