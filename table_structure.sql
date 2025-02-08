-- Drop existing tables in the proper order (because of foreign key constraints)
DROP TABLE IF EXISTS team_scores;
DROP TABLE IF EXISTS questions;
DROP TABLE IF EXISTS teams;

-- Create the teams table.
CREATE TABLE teams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    pax1 VARCHAR(255) NOT NULL,
    pax2 VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Create the questions table.
-- The code uses fields "id", "name" and "points".
CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    points INT NOT NULL,
    description TEXT  -- Optional: to store a full question text if needed.
);

-- Create the team_scores table.
-- This table keeps track of the score each team has for each question.
CREATE TABLE team_scores (
    team_id INT NOT NULL,
    question_id INT NOT NULL,
    score INT NOT NULL DEFAULT 0,
    PRIMARY KEY (team_id, question_id),
    CONSTRAINT fk_team FOREIGN KEY (team_id) REFERENCES teams(id) ON DELETE CASCADE,
    CONSTRAINT fk_question FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
);
