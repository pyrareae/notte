require "test_helper"

class UserSessionsControllerTest < ActionDispatch::IntegrationTest
  setup do
    @user_session = user_sessions(:one)
  end

  test "should get index" do
    get log_in_url
    assert_response :success
  end

  test "should get new" do
    get new_log_in_url
    assert_response :success
  end

  test "should create user_session" do
    assert_difference("UserSession.count") do
      post log_in_url, params: { user_session: { password: @user_session.password, username: @user_session.username } }
    end

    assert_redirected_to log_in_url(UserSession.last)
  end

  test "should show user_session" do
    get log_in_url(@user_session)
    assert_response :success
  end

  test "should get edit" do
    get edit_log_in_url(@user_session)
    assert_response :success
  end

  test "should update user_session" do
    patch log_in_url(@user_session), params: { user_session: { password: @user_session.password, username: @user_session.username } }
    assert_redirected_to log_in_url(@user_session)
  end

  test "should destroy user_session" do
    assert_difference("UserSession.count", -1) do
      delete log_in_url(@user_session)
    end

    assert_redirected_to log_in_url
  end
end
