import { Footprints, ShoppingBag } from "lucide-react";
import Image from "next/image";
import React from "react";

const Page = () => {
  return (
    <div>
      <p className="text-center text-3xl font-semibold">
        Ruby Store cung cấp những sản phẩm gỉ?
      </p>
      <div className=" pointer-events-none select-none">
        <div className="after:gradient-mask relative isolate h-[640px] w-full overflow-hidden after:absolute after:inset-x-0 after:bottom-0 after:h-[300px]">
          <div className="relative inset-x-1/2 mx-[-50vw] my-[-200px] w-screen lg:my-0">
            <div className="iecUHQ ">
              <div className="cAoWIW">
                <div className="CobLO shadow-lg ">
                  <ShoppingBag />
                  <Footprints />
                  <p className="font-semibold ">All shoes you need</p>
                </div>
              </div>
              {/* Overlap layer */}
              <div className="bbQmco shadow-2xl lg:my-48 lg:scale-150">
                <div className="fKSjgO text-slate-600">Sneaker</div>
                <div className="p-[20px]">
                  <div className="w-full">
                    <Image
                      src="https://images.unsplash.com/photo-1605408499391-6368c628ef42?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDJ8fHxlbnwwfHx8fHw%3D"
                      alt=""
                      className="h-64 w-full rounded-lg object-cover"
                      width={300}
                      height={300}
                    />
                    <p className="text_primary mt-5 text-2xl font-semibold">
                      Nike Air Force 1
                    </p>
                    <p className="text_primary mt-2 text-3xl font-semibold">
                      1.990.000 VND
                    </p>
                    <p className="text_primary mt-2 text-xl font-light">
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                      Cupiditate et similique aperiam perspiciatis consequuntur
                      aut nam quaerat non accusamus omnis.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div className="flex">
        <p className="text_primary text-3xl font-semibold">
          Chúng tôi mang lại trải nghiệm mua sắm tốt nhất cho bạn.
        </p>
      </div>
    </div>
  );
};

export default Page;
