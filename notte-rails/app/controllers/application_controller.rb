class ApplicationController < ActionController::Base
  before_action :authenticate!
  before_action :current_user # Adding as a filter to load the @current_user var to always be available for the layout template

  def current_user
    @current_user ||= UserSession.validate(session[:authorization] || request.headers['authorization'])
  end

  def authenticate!
    redirect_to log_in_url unless current_user
  end
end
