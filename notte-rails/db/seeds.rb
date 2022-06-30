lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis scelerisque tortor. Nullam quis tempor augue. Etiam fringilla odio sapien, vel efficitur quam efficitur ut. Sed nec erat in augue finibus dictum sit amet et risus. Aliquam id cursus purus. Cras tristique tristique arcu ac semper. Aenean iaculis nisl urna, sit amet venenatis ex aliquam ut."


user = User.create! username: 'user', password: 'password'

64.times {Note.create! user:, note: lorem}