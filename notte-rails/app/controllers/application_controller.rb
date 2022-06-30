class ApplicationController < ActionController::Base
  before_action :authenticate!

  def current_user
    @current_user ||= UserSession.validate(session[:authorization] || request.headers['authorization'])
  end

  def authenticate!
    redirect_to log_in_url unless current_user
  end
end
