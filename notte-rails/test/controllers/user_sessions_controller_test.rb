require "test_helper"

class UserSessionsControllerTest < ActionDispatch::IntegrationTest
  setup do
    @user = users(:one)
  end

  test "should create user_session" do
    assert_difference("UserSession.count") do
      post log_in_url, params: { user_session: { password: 'password', username: @user.username } }
    end

    assert_redirected_to root_url
  end

  test "should destroy user_session" do
    post log_in_url, params: { user_session: { password: 'password', username: @user.username } }
    assert_difference("UserSession.count", -1) do
      delete log_out_url
    end

    assert_redirected_to log_in_url
  end
end
