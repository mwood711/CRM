USE [CRM]
GO

INSERT INTO [dbo].[Contact]
           ([contact_id]
           ,[fname]
           ,[lname]
           ,[title]
           ,[info]
           ,[phone]
           ,[email]
           ,[address]
           ,[city]
           ,[state]
           ,[zip]
           ,[company_id])
     VALUES
           (1001, 'TestName', 'TestLastName', 'TestTitle', 'TestInfo', '000-000-000', 'TestEmail', 'TestAddress', 'TestCity', 'TestState', '30000', 2001)
GO


