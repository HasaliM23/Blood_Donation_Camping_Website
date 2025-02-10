import mysql.connector
from twilio.rest import Client
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

# Database configuration
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'donors'
}

# Twilio configuration
twilio_account_sid = 'sid'
twilio_auth_token = 'token'
twilio_phone_number = '0771234567'

# Email configuration
smtp_server = 'your_smtp_server'
smtp_port = 587  # or 465 for SSL
email_user = 'your_email@example.com'
email_password = 'your_email_password'

# Connect to the MySQL database
def get_users():
    connection = mysql.connector.connect(**db_config)
    cursor = connection.cursor(dictionary=True)
    cursor.execute("SELECT name, email, mobile FROM users")
    users = cursor.fetchall()
    cursor.close()
    connection.close()
    return users

# Send SMS using Twilio
def send_sms(to, message):
    client = Client(twilio_account_sid, twilio_auth_token)
    message = client.messages.create(
        body=message,
        from_=twilio_phone_number,
        to=to
    )
    return message.sid

# Send email
def send_email(to, subject, body):
    msg = MIMEMultipart()
    msg['From'] = email_user
    msg['To'] = to
    msg['Subject'] = subject

    msg.attach(MIMEText(body, 'plain'))

    with smtplib.SMTP(smtp_server, smtp_port) as server:
        server.starttls()
        server.login(email_user, email_password)
        server.send_message(msg)

def main():
    users = get_users()
    for user in users:
        message = f"Hello {user['name']}, this is a test message."

        # Send SMS
        try:
            sms_sid = send_sms(user['phone'], message)
            print(f"SMS sent to {user['phone']} with SID {sms_sid}")
        except Exception as e:
            print(f"Failed to send SMS to {user['phone']}: {e}")

        # Send Email
        try:
            send_email(user['email'], "Test Email", message)
            print(f"Email sent to {user['email']}")
        except Exception as e:
            print(f"Failed to send email to {user['email']}: {e}")

if __name__ == "__main__":
    main()
