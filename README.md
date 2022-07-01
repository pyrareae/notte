# Notte
## A note keeping demo in multiple implementations

# Implementations
There are 3 roles the projects can have, SPA app, MPA app, and API server. Some of the servers can fill multiple roles. The SPA apps need a running api server to function.

|Directory|Server|Client|Notes|finished?|
|---------|------|------|-----|---------|
|notte-rails|HOTW/API|MPA||90%|
|notte-laravel|MPA/API|MPA||No|
|notte-vue|No|SPA||WIP|
|notte-angular-legacy|No|SPA||No|

*HOTW: HTML Over The Wire  
*MPA: Multi Page Application, i.e., traditional server rendered pages  
*SPA: Single Page Application  

## notte-rails
Basic Rails 7 server. Using the new jsbundling asset pipeline. This is using html over the wire for the server ui and runs a json api for use with spa apps. I've skipped Devise and opted for a simple auth system because I felt like it.

## notte-laravel
TODO

## notte-vue
TODO

Future: 
- roda
- sinatra
- barebones rack
- clojure
- CL
- asp.net
- c++ (oatpp?)
- go
- flask
- lua
- node.js (next,express,nest)
- react
- svelte
- angular1&2
# Contributing
This is a personal project, so I don't accept PRs. Feel free to fork this and play with it though! 😺