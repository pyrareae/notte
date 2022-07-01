require "test_helper"

class UsersControllerTest < ActionDispatch::IntegrationTest
  setup do
    # @user = users(:one)
  end

  test "should create user" do
    assert_difference("User.count") do
      post users_url, params: { user: { password: 'password', username: 'username test 123' } }

      assert_equal 302, response.status
      assert_redirected_to log_in_url
    end
  end
end
