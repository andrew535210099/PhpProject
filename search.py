import os
import fitz  # PyMuPDF

output_directory = "pdf_output"

# Iterate through PDF files in the output directory
for filename in os.listdir(output_directory):
    if filename.endswith(".pdf"):
        pdf_filename = os.path.join(output_directory, filename)

        try:
            # Open the PDF document
            pdf_document = fitz.open(pdf_filename)

            # Iterate through pages
            for page_number in range(pdf_document.page_count):
                page = pdf_document[page_number]
                text = page.get_text()

                # Search for 'CYNTHIA' in the PDF content
                if 'CYNTHIA' in text:
                    print(f"'CYNTHIA' found in {filename}, page {page_number + 1}")

            # Close the PDF document
            pdf_document.close()

        except Exception as e:
            print(f"An error occurred while processing {filename}: {e}")
