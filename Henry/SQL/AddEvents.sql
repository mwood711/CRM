USE [CRM]
GO

INSERT INTO [dbo].[Event]
           ([event_id]
           ,[description]
           ,[date]
           ,[start_time]
           ,[address]
           ,[price]
           ,[event_type_id])
     VALUES
           (7, 'career fair', '2020-11-01', '11:00', '1000 Chastain Rd', '100', 3)

GO


