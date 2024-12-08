<!-- Testimonial Submission Form -->
<section id="submit-testimonial" style="padding: 60px 0; background-color: #f9f9f9;">
    <div class="container" style="max-width: 800px; margin: 0 auto; padding: 0 15px;">
        <h2 class="section-title" style="text-align: center; font-size: 2.5rem; margin-bottom: 40px; color: #333;">
            Share Your Experience
        </h2>
        <form action="submit-testimonial.php" method="post" enctype="multipart/form-data" style="background-color: #ffffff; border-radius: 10px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; font-size: 1rem; color: #333;">Your Name</label>
                <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem; color: #333;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="photo" style="display: block; font-size: 1rem; color: #333;">Your Photo (optional)</label>
                <input type="file" id="photo" name="photo" accept="image/*" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="testimonial" style="display: block; font-size: 1rem; color: #333;">Your Testimonial</label>
                <textarea id="testimonial" name="testimonial" rows="4" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem; color: #333;"></textarea>
            </div>
            <div style="text-align: center;">
                <button type="submit" style="background-color: #007bff; color: #ffffff; border: none; padding: 15px 30px; border-radius: 5px; font-size: 1rem; cursor: pointer;">
                    Submit Testimonial
                </button>
            </div>
        </form>
    </div>
</section>
