//
//  main.m
//  3061 Scouting
//
//  Created by Yasha Mostofi on 11/6/13.
//  Copyright (c) 2013 Yasha Mostofi. All rights reserved.
//

#import <UIKit/UIKit.h>
#import <iAd/iAd.h>
#import <math.h>
#import <QuartzCore/QuartzCore.h>


#define BARBUTTON(TITLE, SELECTOR) [[UIBarButtonItem alloc] initWithTitle:TITLE style:UIBarButtonItemStylePlain target:self action:SELECTOR]

@interface ScoutingController : UIViewController <ADBannerViewDelegate>
{
    UILabel *hello;
}


@end

@implementation ScoutingController


- (void)viewDidLoad
{
    self.view.backgroundColor = [UIColor whiteColor];
    hello = [[UILabel alloc] initWithFrame:CGRectMake(100.0, 100.0, 100.0, 100.0)];
    hello.text = @"Hello!";
    hello.textAlignment = NSTextAlignmentCenter;
    hello.backgroundColor = [UIColor clearColor];
    
    [self.view addSubview:hello];
    
    self.title = @"3061 Scouting";
}

// allow app to work in all orientations
- (BOOL) shouldAutororateToInterfaceOrientation:(UIInterfaceOrientation)toInterfaceOrientation
{
    return NO;
}


@end

@interface TestBedAppDelegate : NSObject <UIApplicationDelegate>
{
    UIWindow *window;
}

@end

@implementation TestBedAppDelegate
- (void)applicationDidFinishLaunching:(UIApplication *)application
{
    window = [[UIWindow alloc] initWithFrame:[[UIScreen mainScreen] bounds]];
    UINavigationController *nav = [[UINavigationController alloc] initWithRootViewController:[[ScoutingController alloc] init]];
    window.rootViewController = nav;
    [window makeKeyAndVisible];
    
}
@end


int main(int argc, char *argv[])
{
    @autoreleasepool {
        UIApplicationMain(argc, argv, nil, @"TestBedAppDelegate");
    }
}