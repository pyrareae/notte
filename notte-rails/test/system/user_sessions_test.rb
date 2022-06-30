require "application_system_test_case"

class UserSessionsTest < ApplicationSystemTestCase
  setup do
    @user_session = user_sessions(:one)
  end

  test "visiting the index" do
    visit log_in_url
    assert_selector "h1", text: "User sessions"
  end

  test "should create user session" do
    visit log_in_url
    click_on "New user session"

    fill_in "Password", with: @user_session.password
    fill_in "Username", with: @user_session.username
    click_on "Create User session"

    assert_text "User session was successfully created"
    click_on "Back"
  end

  test "should update User session" do
    visit log_in_url(@user_session)
    click_on "Edit this user session", match: :first

    fill_in "Password", with: @user_session.password
    fill_in "Username", with: @user_session.username
    click_on "Update User session"

    assert_text "User session was successfully updated"
    click_on "Back"
  end

  test "should destroy User session" do
    visit log_in_url(@user_session)
    click_on "Destroy this user session", match: :first

    assert_text "User session was successfully destroyed"
  end
end
