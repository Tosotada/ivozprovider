Feature: Update brand urls
  In order to manage brand urls
  As an super admin
  I need to be able to update them through the API.

  @createSchema
  Scenario: Update an brand urls
    Given I add Brand Authorization header
     When I add "Content-Type" header equal to "application/json"
      And I add "Accept" header equal to "application/json"
      And I send a "PUT" request to "/brand_urls/2" with body:
    """
      {
          "url": "https://updated-example.com",
          "klearTheme": "redmond",
          "urlType": "user",
          "name": "Updated Portal",
          "userTheme": "default",
          "id": 1,
          "logo": {
              "fileSize": null,
              "mimeType": null,
              "baseName": null
          },
          "brand": 1
      }
    """
    Then the response status code should be 200
     And the response should be in JSON
     And the header "Content-Type" should be equal to "application/json; charset=utf-8"
     And the JSON should be like:
    """
      {
          "url": "https://updated-example.com",
          "klearTheme": "redmond",
          "urlType": "user",
          "name": "Updated Portal",
          "userTheme": "default",
          "id": 2,
          "logo": {
              "fileSize": null,
              "mimeType": null,
              "baseName": null
          },
          "brand": "~"
      }
    """
