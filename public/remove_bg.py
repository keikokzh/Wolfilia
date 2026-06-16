from PIL import Image

def remove_white_bg(input_path, output_path):
    img = Image.open(input_path)
    img = img.convert("RGBA")
    datas = img.getdata()
    
    newData = []
    # Find background color (assuming top-left pixel is background, or just use white)
    # Let's consider near-white as background
    for item in datas:
        # Check if the pixel is near white
        # R, G, B > 230
        if item[0] > 230 and item[1] > 230 and item[2] > 230:
            newData.append((255, 255, 255, 0)) # transparent
        else:
            newData.append(item)
            
    img.putdata(newData)
    img.save(output_path, "PNG")

print("Processing ikanlele.jpg...")
remove_white_bg("ikanlele.jpg", "ikanlele_transparent.png")
print("Processing ikannila.jpg...")
remove_white_bg("ikannila.jpg", "ikannila_transparent.png")
print("Done!")
