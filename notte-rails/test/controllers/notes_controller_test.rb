require "test_helper"

class NotesControllerTest < ActionDispatch::IntegrationTest
  setup do
    @note = notes(:one)
    @user = users :one
    post log_in_url, params: { user_session: { password: 'password', username: @user.username } }
  end

  TEXT = 'test note text'

  test "should get index" do
    get notes_url
    assert_response :success
  end

  test "should get new" do
    get new_note_url
    assert_response :success
  end

  test "should create note" do
    assert_difference("Note.count") do
      post notes_url, params: { note: { note: TEXT } }
    end

    assert_redirected_to note_url(Note.last)
    assert_equal Note.last.note, TEXT
  end

  test "should show note" do
    get note_url(@note)
    assert_response :success
    assert_match @note.note, response.body
  end

  test "should get edit" do
    get edit_note_url(@note)
    assert_response :success
  end

  test "should update note" do
    patch note_url(@note), params: { note: { note: @note.note, user_id: @note.user_id } }
    assert_redirected_to note_url(@note)
  end

  test "should destroy note" do
    assert_difference("Note.count", -1) do
      delete note_url(@note)
    end

    assert_redirected_to notes_url
  end
end
