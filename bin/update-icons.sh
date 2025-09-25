#! /usr/bin/env bash

# -----------------------------------------------------------------------------
# Description : Downloads selected Font Awesome icons (solid + brands).
#               Icons are saved without "square-" prefix if present.
#
# Author      : Benno Bielmeier
# -----------------------------------------------------------------------------

set -euo pipefail

ASSETS_DIR="assets/img/socialmedia"
mkdir -p "$ASSETS_DIR"

FA_VERSION="7.0.1"
BASE_URL="https://raw.githubusercontent.com/FortAwesome/Font-Awesome/refs/tags/$FA_VERSION/svgs"

SOLID_ICONS=("square-envelope")
BRAND_ICONS=("square-facebook" "square-github" "square-instagram" "square-linkedin"
             "tiktok" "square-x-twitter" "square-xing" "square-youtube" "square-whatsapp")

TOTAL=$(( ${#SOLID_ICONS[@]} + ${#BRAND_ICONS[@]} ))
COUNT=0

progress() {
    local current=$1
    local total=$2
    local width=40
    local filled=$(( current * width / total ))
    printf "\r[%-${width}s] %d/%d" \
           "$(printf '#%.0s' $(seq 1 $filled))" \
           "$current" "$total"
}

# Function to download one icon
download_icon() {
    local style=$1
    local name=$2
	local save_name="${name#square-}"  # strip "square-" prefix
    local target="$ASSETS_DIR/$save_name.svg"
	echo "$target" # hacky return
    curl -sSL "$BASE_URL/$style/$name.svg" -o "$target"
}

compress_icon() {
    local icon_path=$1
	svgo --multipass "$icon_path"
}

for icon in "${SOLID_ICONS[@]}"
do
    COUNT=$((COUNT + 1))
    progress "$COUNT" "$TOTAL"

	# Instead of solid style we could download some (not all) icons in regular style.
	# To do so replace "solid" with "regular".
	path=$(download_icon "solid" "$icon")
	compress_icon "$path"
done

for icon in "${BRAND_ICONS[@]}"
do
    COUNT=$((COUNT + 1))
    progress "$COUNT" "$TOTAL"

	path=$(download_icon "brands" "$icon")
	compress_icon "$path"
done

echo -e "\nDownload completed: $TOTAL icons saved in $ASSETS_DIR"
