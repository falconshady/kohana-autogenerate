# Kohana AutoGenerate

	Módulo incompleto, em estágio inicial.

Este módulo cria Recursos (Scaffolds, Controllers, ORMs, Views) com Kohana através de interface Web com layout baseado no bootstrap do twitter.

## Requirements

* [Kohana Database]
* [Kohana ORM]
* [Bootstrap from Twitter](http://twitter.github.com/bootstrap/) >= 2

## Usage

	copy kohana-generate/ modules/kohana-generate/
	Altere o application/boostrap.php...
	kohana::modules(array(..."kohana-generate" => MODPATH.'kohana-generate',...));
	Acesse no navegador...
	http://localhost/seu-app/autogenerate/


Com o Kohana-Generate você pode gerar código para o seu sistema. Caso os controllers, models e views já existam, eles serão re-escritos.

## Funcionalidades Iniciais

* Gerar migrations
* Gerar as tabelas no banco de dados relacionadas às migrations
* Gerar controllers, models e views baseados nas migrations existentes

# Funcionalidades Futuras

* Gerar código de módulos da mesma forma que gera para application
