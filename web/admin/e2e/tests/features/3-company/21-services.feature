@company
@services
@company21

Feature: CompanyServices admin page
  As a main operator
  I want to be able to access conference rooms admin page
  emulating brand operator
  emulating company operator
  In order to check and manage them

Background:
  Given I am on the Dashboard
   When I click on brand emulation button
    And I emulate the brand at position "1"
    And I click on company emulation button
    And I emulate the company at position "1"
    And I click on "CompanyServices" CTA
   Then I am on "CompanyServices" list

@skip
Scenario: I can create company services
  When I click on add button
   And I fill out the form with "company/services/new" data fixture
   And I click on save button
  Then I can see confirmation dialog
  When I click on close dialog button
  Then I am on "CompanyServices" list
  When I click on "CompanyServices" last elements edit button
  Then I compare the form data with "company/services/new" data fixture

Scenario: I can edit company services
  Given I can see at least one row
   When I click on "CompanyServices" first elements edit button
    And I click on save button
   Then I can see confirmation dialog
   When I click on close dialog button
   Then I am on "CompanyServices" list

Scenario: I can click on delete user button
  Given I can see at least one row
   When I select element at position "1"
    And I click on "CompanyServices" delete button in the footer
   Then I can see confirmation dialog
   When I click on close dialog button
   Then I am on "CompanyServices" list
