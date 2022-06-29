class CreateUserSessions < ActiveRecord::Migration[7.0]
  def change
    create_table :user_sessions do |t|
      t.references :user, null: false, foreign_key: true, index: true
      t.text :token, index: true

      t.timestamps
    end
  end
end
