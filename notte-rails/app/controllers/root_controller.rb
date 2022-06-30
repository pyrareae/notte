class RootController < ApplicationController
  skip_before_action :authenticate!
  
  def index
    current_user.present? or return redirect_to(log_in_url)
    
    redirect_to notes_url
  end
end
