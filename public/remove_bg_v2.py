from PIL import Image

def remove_white_bg(input_path, output_path):
    img = Image.open(input_path)
    img = img.convert("RGBA")
    datas = img.getdata()
    
    newData = []
    # Consider near-white as background
    for item in datas:
        # Check if the pixel is near white
        if item[0] > 230 and item[1] > 230 and item[2] > 230:
            newData.append((255, 255, 255, 0)) # transparent
        else:
            newData.append(item)
            
    img.putdata(newData)
    img.save(output_path, "PNG")

print("Processing ikannilav2.jpg...")
remove_white_bg("ikannilav2.jpg", "ikannilav2_transparent.png")
print("Done!")
