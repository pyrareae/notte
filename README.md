# Notte
## A note keeping demo in multiple implementations

# Implementations
There are 3 roles the projects can have, SPA app, MPA app, and API server. Some of the servers can fill multiple roles. The SPA apps need a running api server to function.

|Directory|Server|Client|Notes|finished?|
|---------|------|------|-----|---------|
|notte-rails|HOTW/API|MPA||99%|
|notte-vue|No|SPA||80%|
|notte-php|MPA|MPA||WIP|
|notte-sinatra|API|No||TODO|
|notte-roda|API|No||TODO|
|notte-laravel|MPA/API|MPA||TODO|
|notte-react|No|SPA||TODO|
|notte-angular-legacy|No|SPA||TODO|
|notte-angular-2|No|SPA||TODO|
|notte-express|API|No||TODO|

*HOTW: HTML Over The Wire  
*MPA: Multi Page Application, i.e., traditional server rendered pages  
*SPA: Single Page Application  

## notte-rails
This is the first one and the reference. Basic Rails 7 server. Using the new jsbundling asset pipeline. This is using html over the wire for the server ui and runs a json api for use with spa apps. I've skipped Devise and opted for a simple auth system because I felt like it.

### Remarks

Rails is my "good ol' reliable" and usually "just works", but I'm used to using it. It gives you a lot for free, which is nice. The new HTML over the wire features are pretty nice and result in a snappy UI in this demo, without the fuss of using a full blown SPA.

Interestingly this was easier to build a full UI (including the css design that is used in all the apps), a backend, and an API(which was essentially zero effort with scaffolding) than it was to build the Vue app!

## notte-vue

I like Vue, I've been using a mixture of the new composition API and the object API. Strictly speaking it would be better to only use the comp API though, however I find that for some situations the object API is a little faster to use. I really like that Vue has it's own version of React hooks now with the comp API, and I think it's a really neat way of doing things.

I also find Pinia a nice break from overly convoluted state management. I test to avoid Redux style systems, typically just using a shared reactive object or a messaging bus if need be. Pinia Is basically the approach I've taken before as it's essentially with a Vue observable with some actions bolted on, but without the annoying verbosity of defining mutators, and getters, and setters for every single attribute. However I really didn't need to use a global state in this app at all, I just wanted to try out Pinia.

## notte-php (WIP)

This is just bare PHP that I'm wrangling into an ad-hoc MVC structure. I've done a toy project with PHP like this before but other than that I have not used PHP much. I'm finding it a strange contrast to how Laravel is presented as very modern, while much information about PHP itself seems rather basic and outdated compared to what I'm used to in Ruby and JS land. The language itself is interesting, but feels a bit clunky compared to my usual gotos.

## notte-laravel
TODO


# Possible Future Implementations

A loose todo list of different versions I might do. Some are much more interesting and obscure than others.

- Ruby
  - Roda
  - Sinatra
  - Barebones rack
- Crystal
- C++
  - Oatpp
  - Qt/QML
- Go
- Python
  - Flask
  - Django
- Lua
- Common Lisp
- Racket
- Clojure
- Perl
- ASP.net
- Node.js
  - Next
  - Express
  - Nest
- React
- Svelte
- Angular1&2
- Imba
- Elm
- Phoenix

# Contributing
This is a personal project, so I don't accept PRs. Feel free to fork this and play with it though! 😺
