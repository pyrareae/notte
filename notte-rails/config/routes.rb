Rails.application.routes.draw do
  get 'log_in', to: 'user_session#new', as: 'log_in'
  post 'log_in', to: 'user_session#create'
  delete 'log_out', to: 'user_session#destroy', as: 'log_out'
  resources :notes
  resources :users
  # Define your application routes per the DSL in https://guides.rubyonrails.org/routing.html

  # Defines the root path route ("/")
  # root "articles#index"
  root "root#index"
end
