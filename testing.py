import os
import requests
import pdfkit

# Set the base URL
base_url = "https://lintar.untar.ac.id/ltrkry/akad_info/pdf_akadinfo_transkrip_ctk.aspx?lnim={}&leksekutor={} "

output_directory = "pdf_output"
os.makedirs(output_directory, exist_ok=True)

# Iterate through values of 'i' from 1 to 200
for i in range(825230200, 825230300):
    # Construct the URL for the current 'i'
    url = base_url.format(i, i)

    try:
        # Make a request to the URL
        response = requests.get(url)

        # Check if the request was successful (status code 200)
        if response.status_code == 200:
            # Save the PDF content to a file in the output directory
            pdf_filename = os.path.join(output_directory, f"transcript_{i}.pdf")
            with open(pdf_filename, "wb") as pdf_file:
                pdf_file.write(response.content)

            print(f"Transcript for i={i} downloaded successfully.")
        else:
            print(f"Failed to download transcript for i={i}. Status code: {response.status_code}")
    except Exception as e:
        print(f"An error occurred for i={i}: {e}")

# Optionally, you can use pdfkit to convert HTML to PDF if the content is not directly in the response
# For example, you can use pdfkit.from_url(url, os.path.join(output_directory, f"transcript_{i}.pdf"))
