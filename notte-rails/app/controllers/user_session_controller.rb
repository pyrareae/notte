class UserSessionController < ApplicationController
  # POST /user_sessions or /user_sessions.json

  def new
    redirect_to root_url if current_user

    @user_session = UserSession.new
  end

  def create
    user = User.find_by(username: user_session_params[:username]) or return head 401
    user.authenticate(user_session_params[:password]) or return head 401 

    @user_session = UserSession.create!(user:)
    session[:authorization] = @user_session.token

    respond_to do |format|
      format.html { redirect_to root_url, notice: "You have successfully logged in!" }
      format.json { render :show, status: :created, location: @user_session }
  end
  end

  # DELETE /user_sessions/1 or /user_sessions/1.json
  def destroy
    UserSession.nuke! current_user

    respond_to do |format|
      format.html { redirect_to log_in_url, notice: "Logged out successfully" }
      format.json { head :no_content }
    end
  end

  private
    # Only allow a list of trusted parameters through.
    def user_session_params
      params.require(:user_session).permit(:username, :password)
    end
end
