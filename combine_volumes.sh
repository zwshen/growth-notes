#!/bin/bash

# The directory containing the markdown files
TARGET_DIR="03-communication/English/ESLPOD/Daily-english-md"

# Check if the directory exists
if [ ! -d "$TARGET_DIR" ]; then
  echo "Error: Directory not found: $TARGET_DIR"
  exit 1
fi

# Navigate to the target directory
cd "$TARGET_DIR" || exit

# Clean up old volume files to prevent appending to them
rm -f Volume-*.md

# Find all markdown files, sort them naturally (e.g., 1, 2, ... 10, 11)
# and create a temporary list.
find . -name "*.md" -maxdepth 1 | sort -V > file_list.tmp

# Split the list of files into chunks of 100, creating temp files (e.g., vol_aa, vol_ab)
split -l 100 file_list.tmp vol_

# Initialize a counter for volume numbers
VOL_NUM=1

# Loop through each temporary volume list file
for VOL_LIST in vol_*; do
  echo "Processing Volume-$VOL_NUM..."
  # Concatenate all files listed in the current volume list into a single Volume-N.md file
  # xargs is used to handle a large number of files gracefully
  cat "$VOL_LIST" | xargs cat >> "Volume-$VOL_NUM.md"
  # Increment the volume number for the next file
  ((VOL_NUM++))
done

# Clean up all temporary files
rm -f file_list.tmp vol_*

echo "Done. All markdown files have been combined into volumes."
