class UserSession < ApplicationRecord
  belongs_to :user
  before_create :generate_token

  # Authenticates and returns user if success, or nil on fail
  def self.validate token
    session = find_by(token:)
    return session.user if session.present?

    nil
  end

  def self.nuke! user
    where(user:).delete_all
  end

  def generate_token
    self.token = SecureRandom.alphanumeric 255
  end
  
end
